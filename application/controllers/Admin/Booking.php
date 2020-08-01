<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
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
        $data['judul'] = 'Booking';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->getAllBooking();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/booking', $data);
        $this->load->view('templates/v_footer');
    }

    public function bookingSelesai($id)
    {
        $data['judul'] = 'Booking Selesai';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->getDataBookingById($id);
        $data['invoice'] = $this->ModelInvoice->getDataInvoiceById($id);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/booking-selesai', $data);
        $this->load->view('templates/v_footer');
    }

    public function bookingSelesaiAksi()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $status = $this->input->post('status_main');

        $booking = $this->ModelBooking->getDataBookingById($id);
        $invoice = $this->ModelInvoice->getDataInvoiceById($id);
        $profit = $this->ModelProfit->getDataByDate();

        $data = array(
            'status_main' => $status,
        );

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
            'status' => 'Booking Selesai'
        );


        $data_profit = array(
            'tahun' => date('Y'),
            'penghasilan' => $profit['penghasilan'] +  $invoice['total_bayar'],
        );

        $this->ModelBooking->update_data($kode, $data);
        $this->ModelBookingHistori->insert_data($data_histori);
        $this->ModelBooking->delete_data($id);
        $get_tahun = date('Y');
        $tahun  = $this->db->query("SELECT tahun FROM profit WHERE tahun = '$get_tahun'")->num_rows();
        if ($tahun > 0) {
            $this->ModelProfit->update_data($get_tahun, $data_profit);
        } else {
            $this->ModelProfit->insert_data($data_profit);
        }
        $this->session->set_flashdata('message', 'Booking Telah Selesai');
        redirect('admin/booking');
    }


    public function bookingHistori()
    {
        $data['judul'] = 'Booking Histori';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();


        $config['base_url'] = 'http://localhost/futsal+/admin/booking/bookingHistori/';
        $config['total_rows'] = $this->ModelBookingHistori->countAllHistori();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        $data['histori'] = $this->ModelBookingHistori->getAllData($data['page'], $config['per_page']);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/booking-histori', $data);
        $this->load->view('templates/v_footer');
    }
}
