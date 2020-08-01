<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        get_Menu();
        if (!$this->session->userdata('email')) {
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Invoice';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->ModelInvoice->getAllInvoice();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/v_footer');
    }

    public function KonfirmasiInvoice($kode)
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->ModelInvoice->getInvoiceByKode($kode);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/konfirmasi-pembayaran', $data);
        $this->load->view('templates/v_footer');
    }


    public function invoiceDownload($kode)
    {
        $this->load->helper('download');
        $buktiPembayaran = $this->ModelInvoice->downloadInvoice($kode);
        $file = 'assets/img/transaksi/' . $buktiPembayaran['bukti_pembayaran'];
        force_download($file, NULL);
    }

    public function cekInvoice()
    {
        $kode = $this->input->post('kode');
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $status_pembayaran = $this->input->post('status_pembayaran');

        $data = [
            'status_pembayaran' => $status_pembayaran,
        ];

        $this->_sendEmail($id);
        $this->ModelInvoice->update_data_invoice($kode, $data);
        redirect('admin/invoice');
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
                color: green;
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
                        <td>Pembayaran Selesai</td>
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
            <p>Terima Kasih telah melakukan Pembayaran dengan tepat waktu.</p>
            <p>Pembayaran anda telah kami proses, anda bisa cek di aplikasi menu booking transaksi.</p>
            <p>Harap untuk datang tepat waktu, agar bisa bermain sesuai dengan keiinginan.</p>
            <br>
            <p>Terima Kasih</p>
            <br>
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
        $this->email->to($this->input->post('email'));
        $this->email->subject('Pembayaran Selesai');
        $this->email->message($message);


        if ($this->email->send()) {
            $this->session->set_flashdata('pesan', "Pembayaran berhasil diterima");
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
