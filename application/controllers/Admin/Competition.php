<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Competition extends CI_Controller
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
        $data['judul'] = 'Competition';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['competition'] = $this->ModelCompetition->getAllCompetition();


        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/competisi/competition', $data);
        $this->load->view('templates/v_footer');
    }


    public function tambahCompetition()
    {
        $competition = $this->input->post('competition');
        $season = $this->input->post('season');


        $data = array(
            'competition' => $competition,
            'id_season' => $season,
            'tgl_input_competition' => date('Y-m-d H:i:s'),
        );

        $this->ModelCompetition->tambah_data($data);
        $this->session->set_flashdata('message', 'competition berhasil di tambahkan');
        redirect('admin/competition');
    }

    public function getUbahCompetition()
    {
        echo json_encode($this->ModelCompetition->getCompetitionById($_POST['id']));
    }

    public function ubahCompetition()
    {
        $id = $this->input->post('id_competition');
        $competition = $this->input->post('competition');
        $season = $this->input->post('season');

        $data = array(
            'competition' => $competition,
            'id_season' => $season
        );

        $this->ModelCompetition->ubah_data($id, $data);
        $this->session->set_flashdata('message', 'competition berhasil di ubah');
        redirect('admin/competition');
    }
}
