<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data['judul'] = 'My Profile';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['news'] = $this->ModelNews->getAllNews();

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('templates/v_footer');
    }

    public function ubahFoto()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $image = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/users/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/lapangan/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }

            $data = [
                'image' => $image,
            ];

            $this->ModelUser->update_data($id, $data);
            $this->session->set_flashdata('pesan', 'Di Ubah');
            redirect('admin/profile');
        }
    }

    public function ubahTelepon()
    {
        $id = $this->input->post('id');
        $telepon = $this->input->post('telepon');

        $data = [
            'telepon' => $telepon,
        ];

        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/profile');
    }

    public function ubahGender()
    {
        $id = $this->input->post('id');
        $gender = $this->input->post('gender');

        $data = [
            'gender' => $gender,
        ];

        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/profile');
    }

    public function ubahTglLahir()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl_lahir');

        $data = [
            'tanggal_lahir' => $tgl,
        ];

        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/profile');
    }

    public function ubahAlamat()
    {
        $id = $this->input->post('id');
        $alamat = $this->input->post('alamat');

        $data = [
            'alamat' => $alamat,
        ];
        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/profile');
    }
}
