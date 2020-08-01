<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
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
        $data['judul'] = 'Info Contact';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['contact'] = $this->ModelContact->getContact();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/contact/index', $data);
        $this->load->view('templates/v_footer');
    }

    public function ubahContact()
    {
        $id = $this->input->post('id_contact');
        $telepon = $this->input->post('telepon');
        $lokasi = $this->input->post('lokasi');
        $website = $this->input->post('website');
        $email = $this->input->post('email');


        $data = array(
            'telepon' => $telepon,
            'lokasi' => $lokasi,
            'website' => $website,
            'email' => $email
        );

        $this->ModelContact->ubahData($id, $data);
        $this->session->set_flashdata('pesan', 'Info Contact berhasil diubah');
        redirect('admin/contact');
    }
}
