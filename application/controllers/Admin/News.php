<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
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
        $data['judul'] = 'News';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }


        //config
        $config['base_url'] = 'http://localhost/futsal+/admin/news/index/';
        $this->db->like('judul', $data['keyword']);
        $this->db->from('news');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;
        $data['total_rows'] = $config['total_rows'];

        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['news'] = $this->ModelNews->getNewsLimit($config['per_page'], $data['page'], $data['keyword']);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/news', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahNews()
    {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('deskripsi');
        $image = $_FILES['image'];
        if ($image = '') {
            $image = 'default.jpg';
        } else {
            $config['upload_path'] = './assets/img/news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'judul' => $judul,
            'keterangan' => $keterangan,
            'image' => $image
        );

        $this->ModelNews->tambahNews($data);
        $this->session->set_flashdata('pesan', 'di Tambahkan');
        redirect('admin/news');
    }

    public function hapusNews($id)
    {
        $this->ModelNews->hapusNews($id);
        $this->session->set_flashdata('pesan', 'di Hapus');
        redirect('admin/news');
    }

    public function getUbahNews()
    {
        echo json_encode($this->ModelNews->getNewsById($_POST['id']));
    }

    public function ubahNews()
    {
        $id = $this->input->post('id');
        $data['news'] = $this->db->get_where('news', ['id' => $id])->row_array();
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('deskripsi');
        $image = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/news/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['news']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/news/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        if (!empty($image)) {
            $data = array(
                'judul' => $judul,
                'keterangan' => $keterangan,
                'image' => $image
            );
        } else {
            $data = array(
                'judul' => $judul,
                'keterangan' => $keterangan,
            );
        }


        $this->ModelNews->ubahNews($id, $data);
        $this->session->set_flashdata('pesan', 'di Ubah');
        redirect('admin/news');
    }
}
