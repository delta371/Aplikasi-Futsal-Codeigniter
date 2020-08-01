<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelLapangan');
        $this->load->model('ModelBank');
        $this->load->model('ModelBooking');
        $this->load->model('ModelInvoice');
        $this->load->model('ModelNotifikasi');
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', "<script>alert('anda harus login dulu');</script>)");
            redirect('home');
        }
    }


    public function invoice()
    {
        $id_user = $this->input->post('id_user');
        $image = $_FILES['image']['name'];
        if ($image = '') {
            $image = 'default.jpg';
        } else {
            $config['upload_path'] = './assets/img/transaksi/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }

            $data_booking = array(
                'status_main' => 'Belum Selesai',
            );

            $data = array(
                'bukti_pembayaran' => $image,
            );

            $data_notifikasi = array(
                'id_user' => $id_user,
                'type' => 'Pembayaran',
                'pesan' => 'Selesai',
                'status' => 'unread',
                'tanggal' => date('Y-m-d H:i:s'),
            );


            $this->ModelBooking->update_data_by_user($id_user, $data_booking);
            $this->ModelInvoice->update_data($id_user, $data);
            $this->ModelNotifikasi->input_data($data_notifikasi);
            $this->session->set_flashdata('message', "Terimakasih pembayaran anda sedang kami proses");
            redirect('home');
        }
    }

    public function cetakInvoice($id)
    {
        $data['judul'] = 'Cetak Invoice';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->ModelBank->getAllBank();
        $data['booking'] = $this->ModelBooking->getDataBookingById($id);
        $data['invoice'] = $this->ModelInvoice->getDataInvoiceById($id);


        $this->load->view('invoice/cetak_invoice.php', $data);
    }
}
