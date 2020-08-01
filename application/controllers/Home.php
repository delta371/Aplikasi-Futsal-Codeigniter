<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelBooking');
        $this->load->model('ModelTestimoni');
        $this->load->model('ModelLapangan');
        $this->load->model('ModelNews');
        $this->load->model('ModelSlider');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);

        $data['lapangan'] = $this->ModelLapangan->getLapanganLimit(3, 1);
        $data['news'] = $this->ModelNews->getNewsLimit(2, 0);
        $data['testimoni'] = $this->ModelTestimoni->getAllData();
        $data['slider'] = $this->ModelSlider->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }
}
