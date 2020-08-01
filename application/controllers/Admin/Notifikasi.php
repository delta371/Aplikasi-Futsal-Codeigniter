<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
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
        $data['judul'] = 'Notifikasi';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['notif'] = $this->ModelNotifikasi->getAllData();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/notifikasi', $data);
        $this->load->view('templates/v_footer');
    }

    public function detailNotifikasi($id)
    {
        $data['judul'] = 'Notifikasi';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['notif'] = $this->ModelNotifikasi->getDataById($id);
        $this->ModelNotifikasi->update_data($id);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/detail-notifikasi', $data);
        $this->load->view('templates/v_footer');
    }


    public function deleteNotifikasi($id)
    {
        $this->ModelNotifikasi->delete_data($id);
        redirect('admin/notifikasi');
    }
}
