<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelLapangan');
        $this->load->model('ModelBooking');
    }

    public function index()
    {

        $data['judul'] = 'Lapangan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();


        //config
        $config['base_url'] = 'http://localhost/futsal+/lapangan/index/';
        $config['total_rows'] = $this->ModelLapangan->countAllLapangan();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['lapangan'] = $this->ModelLapangan->getLapanganLimit($config['per_page'], $data['page']);

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('lapangan/index', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }

    public function jadwalLapangan($kode)
    {
        $data['judul'] = 'Lapangan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);

        $data['jadwal'] = $this->ModelBooking->getJadwalLapangan($kode);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('lapangan/jadwal_lapangan', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }
}
