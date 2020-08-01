<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelNews');
        $this->load->model('ModelBooking');
    }

    public function index()
    {
        $data['judul'] = 'News';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['news'] = $this->ModelNews->getAllNews();

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('news/index', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }
}
