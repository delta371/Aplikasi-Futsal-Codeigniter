<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Season extends CI_Controller
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
        $data['judul'] = 'Season';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['season'] = $this->ModelSeason->getAllSeason();


        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/competisi/season', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahSeason()
    {
        $sesi = $this->input->post('season');

        $data = array(
            'season' => $sesi,
            'tgl_input' => date('Y-m-d H:i:s'),
        );

        $this->ModelSeason->tambahSeason($data);
        $this->session->set_flashdata('message', 'Season berhasil di tambah');
        redirect('admin/season');
    }

    public function hapusSeason($id)
    {
        $this->ModelSeason->hapus_data($id);
        $this->session->set_flashdata('message', 'Season berhasil di hapus');
        redirect('admin/season');
    }

    public function getUbahSeason()
    {
        echo json_encode($this->ModelSeason->getSeasonById($_POST['id']));
    }

    public function ubahSeason()
    {
        $id = $this->input->post('id_season');
        $season = $this->input->post('season');
        $data = array(
            'season' => $season,
        );

        $this->ModelSeason->ubahSeason($id, $data);
        $this->session->set_flashdata('message', 'Season berhasil di ubah');
        redirect('admin/season');
    }
}
