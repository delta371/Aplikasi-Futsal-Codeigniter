<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
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
        $data['judul'] = 'Testimoni';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();



        //config
        $config['base_url'] = 'http://localhost/futsal+/admin/testimoni/index/';
        $config['total_rows'] = $this->ModelTestimoni->countAllTestimoni();
        $config['per_page'] = 2;
        $data['total_rows'] = $config['total_rows'];
        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['testimoni'] = $this->ModelTestimoni->getTestimoniLimit($data['page'], $config['per_page']);
        $data['member'] = $this->ModelUser->getAllMember();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/testimoni', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahTestimoni()
    {
        $id = $this->input->post('member');
        $ulasan = $this->input->post('ulasan');

        $data = [
            'id_user' => $id,
            'tanggal_ulasan' => date('Y:m:d'),
            'ulasan' => $ulasan,
        ];
        $this->ModelTestimoni->insert_data($data);
        $this->session->set_flashdata('pesan', 'di Tambahkan');
        redirect('admin/testimoni');
    }

    public function deleteTestimoni($id)
    {
        $this->ModelTestimoni->hapusTestimoni($id);
        $this->session->set_flashdata('pesan', 'di Hapus');
        redirect('admin/testimoni');
    }
}
