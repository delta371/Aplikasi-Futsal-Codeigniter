<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        get_Menu();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Slider';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['slider'] = $this->ModelSlider->getAllData();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/slider', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahSlider()
    {
        $slider = $this->input->post('slider');

        $data = [
            'slider' => $slider
        ];

        $this->ModelSlider->insert_data($data);
        $this->session->set_flashdata('pesan', 'di Tambahkan');
        redirect('admin/slider');
    }


    public function ubahSlider()
    {
        echo json_encode($this->ModelSlider->getSliderById($_POST['id']));
    }

    public function getUbahSlider()
    {
        $id = $this->input->post('no');
        $slider = $this->input->post('slider');
        $data = [
            'slider' => $slider
        ];
        $this->ModelSlider->update_data($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/slider');
    }

    public function deleteSlider($id)
    {
        $this->ModelSlider->hapusSlider($id);
        $this->session->set_flashdata('pesan', 'di Hapus');
        redirect('admin/slider');
    }
}
