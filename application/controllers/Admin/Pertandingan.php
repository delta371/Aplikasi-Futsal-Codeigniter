<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertandingan extends CI_Controller
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
        $data['judul'] = 'Pertandingan';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['pertandingan'] = $this->ModelPertandingan->getAllPertandingan();



        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/competisi/pertandingan', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahPertandingan()
    {
        $competition = $this->input->post('competition');
        $tanggal = $this->input->post('tanggal');
        $mulai = $this->input->post('jam_mulai');
        $selesai = $this->input->post('jam_selesai');
        $home = $this->input->post('home');
        $away = $this->input->post('away');
        $lapangan = $this->input->post('lapangan');

        $data = array(
            'competition' => $competition,
            'tgl_main' => $tanggal,
            'jam_mulai' => $mulai,
            'jam_selesai' => $selesai,
            'home' => $home,
            'away' => $away,
            'lapangan' => $lapangan,
            'tgl_input_pertandingan' => date('Y-m-d H:i:s')
        );

        $this->ModelPertandingan->tambahData($data);
        $this->session->set_flashdata('message', 'Pertandingan berhasil di tambahkan');
        redirect('admin/pertandingan');
    }

    public function getUbahPertandingan()
    {
        echo json_encode($this->ModelPertandingan->getPertandinganById($_POST['id']));
    }

    public function ubahPertandingan()
    {
        $id_pertandingan = $this->input->post('id_pertandingan');
        $competition = $this->input->post('competition');
        $tanggal = $this->input->post('tanggal');
        $mulai = $this->input->post('jam_mulai');
        $selesai = $this->input->post('jam_selesai');
        $home = $this->input->post('home');
        $away = $this->input->post('away');
        $lapangan = $this->input->post('lapangan');

        $data = array(
            'competition' => $competition,
            'tgl_main' => $tanggal,
            'jam_mulai' => $mulai,
            'jam_selesai' => $selesai,
            'home' => $home,
            'away' => $away,
            'lapangan' => $lapangan
        );

        $this->ModelPertandingan->ubahPertandingan($id_pertandingan, $data);
        $this->session->set_flashdata('message', 'Pertandingan berhasil diubah');
        redirect('admin/pertandingan');
    }

    public function hapusPertandingan($id)
    {
        $this->ModelPertandingan->hapusPertandingan($id);
        $this->session->set_flashdata('message', 'Pertandingan berhasil di hapus');
        redirect('admin/pertandingan');
    }
}
