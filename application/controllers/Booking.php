<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelLapangan');
        $this->load->model('ModelBank');
        $this->load->model('ModelBooking');
        $this->load->model('ModelInvoice');
        $this->load->model('ModelTestimoni');
        $this->load->model('ModelProfit');
        $this->load->model('ModelBookingHistori');
        $this->load->model('ModelNotifikasi');
    }

    public function getKodeBooking()
    {
        //Mengambil tahun
        $tahun = date('y');
        $lastKode = $this->ModelBooking->getMaxByKode()->row_array();
        $kode = $lastKode['kd_booking'];

        //nourut
        $noUrut = substr($kode, 3, 2);
        $tambah = (int) $noUrut + 1;


        if (strlen($tambah) == 1) {
            $newKode = "F" . $tahun . "0" . $tambah;
        } else {
            $newKode = "F" . $tahun . $tambah;
        }

        return $newKode;
    }

    public function getKodeInvoice()
    {
        $tahun = date('Y');
        $lastInvoice = $this->ModelInvoice->getMaxByInvoice()->row_array();
        $kode = $lastInvoice['kd_invoice'];

        //nourut
        $noUrut = substr($kode, 8, 3);
        $tambah = (int) $noUrut + 1;


        if (strlen($tambah) == 1) {
            $newKode = "INV-" . $tahun . "00" . $tambah;
        } elseif (strlen($tambah) == 2) {
            $newKode = "INV-" . $tahun . "0" . $tambah;
        } else {
            $newKode = "INV-" . $tahun . $tambah;
        }
        return $newKode;
    }


    public function index()
    {
        $data['judul'] = 'Booking';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['lapangan'] = $this->ModelLapangan->getLapangan();
        $data['bank'] = $this->ModelBank->getAllBank();

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('booking/index');
        $this->load->view('templates/footer');
    }

    public function finishBook()
    {
        if (!$this->session->userdata('email')) {
            redirect('booking');
        }
        $data['judul'] = 'Booking';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['lapangan'] = $this->ModelLapangan->getLapangan();
        $data['bank'] = $this->ModelBank->getAllBank();
        $u = $this->session->userdata('id_user');
        $data['booking'] = $this->ModelBooking->getDataBookingById($u);
        $data['invoice'] = $this->ModelInvoice->getDataInvoiceById($u);
        $this->load->view('templates/header', $data);
        $this->load->view('booking/finish-book', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/footer');
    }

    public function booking()
    {
        $data['judul'] = 'Booking';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['lapangan'] = $this->ModelLapangan->getLapangan();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('warning', "Anda Harus Login Dulu");
            redirect('home');
        }

        $data['bank'] = $this->ModelBank->getAllBank();

        $user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $tgl_booking = $this->input->post('tgl_booking');
        $mulai = $this->input->post('jam_mulai');
        $selesai = $this->input->post('jam_selesai');
        $jam_mulai = strtotime($mulai);
        $jam_selesai = strtotime($selesai);
        $detik = $jam_selesai - $jam_mulai;
        $total_jam = $detik / 3600;
        $lapangan = $this->input->post('lapangan');
        if ($jam_mulai <= "12:00:00") {
            $bayar = 75000;
            $dp = 38000;
        } elseif ($jam_mulai <= "18:00:00") {
            $bayar = 100000;
            $dp = 50000;
        } else {
            $bayar = 125000;
            $dp = 63000;
        }
        $bank = $this->input->post('inlineRadioOptions');
        $harga = $bayar;
        $total_bayar = $harga * $total_jam;
        $uang_muka = $dp * $total_jam;
        $sisa_bayar = $total_bayar - $uang_muka;
        $invoice = $this->getKodeInvoice();

        $data_booking = array(
            'kd_booking' => $this->getKodeBooking(),
            'id_user' => $user,
            'nama' => $nama,
            'email' => $email,
            'tgl_booking' => $tgl_booking,
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'total_jam' => $total_jam,
            'harga' => $harga,
            'kd_lapangan' => $lapangan,
            'status_main' => 'Sedang Proses',
            'kd_invoice' => $this->getKodeInvoice(),
        );

        $data_invoice = array(
            'kd_invoice' => $this->getKodeInvoice(),
            'id_user' => $user,
            'id_bank' => $bank,
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'batas_pembayaran' => date('Y-m-d H:i:s', mktime(date('H') + 5, date('i'), date('s'), date('m'), date('d'), date('Y'))),
            'total_bayar' => $total_bayar,
            'uang_muka' => $uang_muka,
            'sisa_bayar' => $sisa_bayar,
            'bukti_pembayaran' => '',
            'status_pembayaran' => 0,
        );

        $data_notifikasi = array(
            'id_user' => $user,
            'type' => 'Booking',
            'pesan' => $lapangan,
            'status' => 'unread',
            'tanggal' => date('Y-m-d H:i:s'),
        );

        $cek_tanggal = $this->db->get_where('booking', ['tgl_booking' => $tgl_booking])->num_rows();
        $cek_booking = $this->db->get_where('booking', ['kd_lapangan' => $lapangan])->num_rows();
        $cek_tgl_competisi = $this->db->get_where('pertandingan', ['tgl_main' => $tgl_booking])->num_rows();
        $cek_pertandingan = $this->db->get_where('pertandingan', ['lapangan' => $lapangan])->num_rows();
        $cek_jam = $this->db->query("SELECT * FROM pertandingan WHERE jam_mulai = '$mulai' AND jam_selesai = '$selesai'")->num_rows();
        $cek_jam_mulai = $this->db->query("SELECT * FROM booking WHERE jam_mulai = '$mulai' AND jam_selesai = '$selesai'")->num_rows();

        if ($cek_tanggal > 0) {
            if ($cek_booking > 0) {
                if ($cek_jam_mulai > 0) {
                    $this->session->set_flashdata('error', 'Maaf Lapangan sudah ada yang memboking. Silahkan cek jadwal lapangan');
                    redirect('booking');
                }
            } else {
                $this->ModelInvoice->input_data($data_invoice);
                $this->ModelBooking->input_data($data_booking);
                $this->ModelNotifikasi->input_data($data_notifikasi);
                $this->_sendEmail($user);
                redirect('booking/finishBook');
            }
        } elseif ($cek_tgl_competisi > 0) {
            if ($cek_pertandingan > 0) {
                if ($cek_jam > 0) {
                    $this->session->set_flashdata('warning', 'Maaf Lapangan sedang di pakai competition');
                    redirect('booking');
                }
            } else {
                $this->ModelInvoice->input_data($data_invoice);
                $this->ModelBooking->input_data($data_booking);
                $this->ModelNotifikasi->input_data($data_notifikasi);
                $this->_sendEmail($user);
                redirect('booking/finishBook');
            }
        } elseif ($mulai > "22:00") {
            $this->session->set_flashdata('warning', 'Maaf kami sudah tutup');
            redirect('booking');
        } elseif ($selesai < $mulai) {
            $this->session->set_flashdata('error', 'jam mulai tidak valid');
            redirect('booking');
        } else {
            $this->ModelInvoice->input_data($data_invoice);
            $this->ModelBooking->input_data($data_booking);
            $this->ModelNotifikasi->input_data($data_notifikasi);
            $this->_sendEmail($user);
            redirect('booking/finishBook');
        }
    }

    private function _sendEmail($id)
    {

        $booking = $this->ModelBooking->getDataBookingById($id);
        $invoice = $this->ModelInvoice->getDataInvoiceById($id);

        $message = '
        <!doctype html>
        <html lang="en">
        <head>
            <style>
        .image h1 {
            color: orange;
        }

            .invoice table {
                width: 100%;
                border: 1px solid black;
                padding: 5px;
            }

            .invoice table .text {
                text-align: right;
                color: red;
            }
            </style>
        </head>
        <body>
            
            <div class="image">
                <center>
                <h1>Futsal+</h1>
                <p>Simple Way To Your Beloved</p>
                </center>
            </div>

            <div class="member">
                <h3>Member</h3>
                <table>
                    <tr>
                        <td>Tanggal Booking &ensp; &ensp;</td>
                        <td>:</td>
                        <td>' . $booking['tgl_booking'] . '</td>
                    </tr>
                    <tr>
                        <td>ID Member</td>
                        <td>:</td>
                        <td>' . $booking['id_user'] . '</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>' . $booking['nama'] . '</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Menunggu Pembayaran</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>' . $booking['email'] . '</td>
                    </tr>
                </table>
            </div>
                 
    
            <div class="invoice">
                <h3>INVOICE : ' . $invoice['kd_invoice'] . '</h3>
    
                <table>
                    <tr style="border-bottom: 2px solid black;">
                        <td>Lapangan</td>
                        <td class="text">' . $booking['nm_lapangan'] . ' &ensp; Futsal+</td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td class="text">' . $booking['jam_mulai'] . '</td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td class="text">' . $booking['total_jam'] . ' &ensp; Jam</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td class="text">IDR ' . number_format($invoice['uang_muka'], 0, ',', ',') . '</td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td class="text">IDR ' . number_format($invoice['uang_muka'] + 123, 0, ',', ',') . '</td>
                    </tr>
                </table>
            </div>

            <div class="keterangan">
            <h3>NOTICE :</h3>
            <p>Mohon <span style="font-weight: bold;">transfer sesuai dengan grand total, tidak lebih dan tidak kurang</span> agar proses booking anda bisa terproses dengan cepat.</p>
            <p>Pembayaran dapat dilakukan melalui rekening yang tertera di atas. Pembayaran dan Konfirmasi transfer dilakukan <span style="font-weight: bold; color:red;">MAKSIMAL 24 JAM</span> setelah anda mendapatkan invoice ini.</p>
            <p>Setelah anda melakukan pembayaran, harap lakukan <span style="color: red; font-weight: bold;">Konfirmasi pembayaran</span> di aplikasi dengan mengupload bukti pembayaran.</p>
            <p>Terima Kasih</p>
            <br>
            <p style="color: black;" >Futsal+</p>
            </div>

            </body>
            </html>
        ';


        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'mamanfams371@gmail.com',
            'smtp_pass' => 'ridwanbw',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('mamanfams371@gmail.com', 'Futsal+');
        $this->email->to($this->session->userdata('email'));
        $this->email->subject('Menunggu Pembayaran');
        $this->email->message($message);


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function bookingSelesai($id)
    {
        $this->ModelInvoice->delete_data($id);
        $this->session->set_flashdata('message', 'Terima Kasih Telah Booking Futsal di kami');
        redirect('profile');
    }

    public function batal_booking($id)
    {
        $invoice = $this->ModelInvoice->getDataInvoiceById($id);
        $profit = $this->ModelProfit->getDataByDate();
        $booking = $this->ModelBooking->getDataBookingById($id);

        $data_histori = array(
            'id_user' => $booking['id_user'],
            'kd_invoice' => $booking['kd_invoice'],
            'kd_lapangan' => $booking['kd_lapangan'],
            'tgl_booking' => $booking['tgl_booking'],
            'jam_mulai' => $booking['jam_mulai'],
            'jam_selesai' => $booking['jam_selesai'],
            'total_jam' => $booking['total_jam'],
            'harga' => $booking['harga'],
            'total_bayar' => $booking['total_bayar'],
            'tgl_input' => date('Y-m-d H:i:s'),
            'status' => 'Booking Di Batalkan'
        );

        $data = [
            'tahun' => date('Y'),
            'penghasilan' => $profit['penghasilan'] + $invoice['uang_muka'],
        ];

        $data_notifikasi = array(
            'id_user' => $id,
            'type' => 'Batal Booking',
            'pesan' => $booking['nm_lapangan'],
            'status' => 'unread',
            'tanggal' => date('Y-m-d H:i:s'),
        );

        $get_tahun = date('Y');

        $tahun  = $this->db->query("SELECT tahun FROM profit WHERE tahun = '$get_tahun'")->num_rows();


        if ($tahun > 0) {
            $this->ModelNotifikasi->input_data($data_notifikasi);
            $this->ModelBookingHistori->insert_data($data_histori);
            $this->ModelProfit->update_data($get_tahun, $data);
            $this->ModelBooking->delete_data($id);
            $this->ModelInvoice->delete_data($id);
            $this->session->set_flashdata('message', 'Booking berhasil dibatalkan');
            redirect('profile/bookingTransaksi');
        } else {
            $this->ModelNotifikasi->input_data($data_notifikasi);
            $this->ModelBookingHistori->insert_data($data_histori);
            $this->ModelProfit->insert_data($data);
            $this->ModelBooking->delete_data($id);
            $this->ModelInvoice->delete_data($id);
            $this->session->set_flashdata('message', 'Booking berhasil dibatalkan');
            redirect('profile/bookingTransaksi');
        }

        // if (!empty($profit['bulan'] == bulan() and $profit['tahun'] == date('Y'))) {
        //     $this->ModelProfit->update_data($data);
        // } else {
        //     $this->ModelProfit->insert_data($data);
        // }

        $data_notifikasi = array(
            'id_user' => $id,
            'type' => 'Batal Booking',
            'pesan' => 'Batal Bookong',
            'status' => 'unread',
            'tanggal' => date('Y-m-d'),
        );

        $this->ModelNotifikasi->input_data($data_notifikasi);
        $this->ModelBooking->delete_data($id);
        $this->ModelInvoice->delete_data($id);
        $this->session->set_flashdata('message', 'Booking Berhasil di Batalkan');
        redirect('profile/bookingTransaksi');
    }
}
