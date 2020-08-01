<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
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
        $data['judul'] = 'Team';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        //config
        $config['base_url'] = 'http://localhost/futsal+/admin/team/index/';
        $this->db->like('nm_team', $data['keyword']);
        $this->db->from('team');

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 1;
        $data['total_rows'] = $config['total_rows'];
        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['team'] = $this->ModelTeam->getTeamLimit($config['per_page'], $data['page'], $data['keyword']);


        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/competisi/team', $data);
        $this->load->view('templates/v_footer');
    }


    public function tambahTeam()
    {
        $team = $this->input->post('team');
        $date = date('Y-m-d H:i:s');
        $logo = $_FILES['logo'];
        if ($logo = '') {
            $logo = 'default.jpg';
        } else {
            $config['upload_path'] = './assets/img/logo_team/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $logo = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'logo' => $logo,
            'nm_team' => $team,
            'tgl_input' => $date
        );

        $this->ModelTeam->tambahData($data);
        $this->session->set_flashdata('message', 'Team berhasil di tambahkan');
        redirect('admin/team');
    }

    public function hapusTeam($id)
    {

        $this->ModelTeam->hapusTeam($id);
        $this->session->set_flashdata('message', 'Team berhasil di hapus');
        redirect('admin/team');
    }

    public function ubahTeam()
    {
        $id = $this->input->post('id_team');
        $team = $this->input->post('team');
        $logo = $_FILES['logo'];
        if ($logo = '') {
            $logo = 'default.jpg';
        } else {
            $config['upload_path'] = './assets/img/logo_team/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $logo = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        if (!empty($logo)) {
            $data = [
                'logo' => $logo,
                'nm_team' => $team,
            ];
        } else {
            $data = [
                'nm_team' => $team
            ];
        }

        $this->ModelTeam->ubahTeam($id, $data);
        $this->session->set_flashdata('message', 'Team berhasil di ubah');
        redirect('admin/team');
    }

    public function getUbahTeam()
    {
        echo json_encode($this->ModelTeam->getTeamById($_POST['id']));
    }
}
