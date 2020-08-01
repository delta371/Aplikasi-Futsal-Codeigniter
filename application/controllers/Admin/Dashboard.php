<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        get_Menu();
        is_logged_in();
    }

    public function index()
    {
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';
        $data['lapangan'] = $this->ModelLapangan->getLapangan();
        $data['tahun'] = $this->ModelProfit->getTahun();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/v_footer');
    }

    public function profit()
    {
        $profit = $this->ModelProfit->getDataProfit();
        echo json_encode($profit);
    }
}
