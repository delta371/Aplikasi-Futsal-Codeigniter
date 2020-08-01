<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('Admin_model');
        $this->load->model('ModelLapangan');
        $this->load->model('ModelNews');
        $this->load->model('ModelBooking');
        $this->load->model('ModelInvoice');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';

        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/v_footer');
    }

    public function lapangan()
    {
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['lapangan'] = $this->ModelLapangan->getLapangan();
        $data['judul'] = 'Lapangan';


        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/lapangan', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahLapangan()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $image = $_FILES['image'];
        if ($image = '') {
            $image = 'default.jpg';
        } else {
            $config['upload_path'] = './assets/img/lapangan/';
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

            $data = array(
                'kd_lapangan' => $kode,
                'nm_lapangan' => $nama,
                'keterangan' => $keterangan,
                'image' => $image
            );

            $this->ModelLapangan->input_data($data);


            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil ditambahkan</div>');
            redirect('admin/lapangan');
        }
    }

    public function hapusLapangan($data)
    {
        $this->ModelLapangan->hapusLapangan($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Lapangan berhasil dihapus</div>');
        redirect('admin/lapangan');
    }

    public function getUbahLapangan()
    {
        echo json_encode($this->ModelLapangan->getLapanganByKode($_POST['id']));
    }

    public function ubahLapangan()
    {

        $kode = $this->input->post('kode');
        $data['lapangan'] = $this->db->get_where('lapangan', ['kd_lapangan' => $kode])->row_array();
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $image = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/lapangan/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['lapangan']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/lapangan/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'kd_lapangan' => $kode,
            'nm_lapangan' => $nama,
            'keterangan' => $keterangan,
            'image' => $image,
        ];

        $this->ModelLapangan->ubahLapangan($kode, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Lapangan berhasil diubah</div>');
        redirect('admin/lapangan');
    }

    public function news()
    {
        $data['judul'] = 'News';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['news'] = $this->ModelNews->getAllNews();
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
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil ditambahkan</div>');
        redirect('admin/news');
    }

    public function hapusNews($id)
    {
        $this->ModelNews->hapusNews($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">News berhasil dihapus</div>');
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
        $data = array(
            'judul' => $judul,
            'keterangan' => $keterangan,
            'image' => $image
        );

        $this->ModelNews->ubahNews($id, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">News berhasil diubah</div>');
        redirect('admin/news');
    }

    public function member()
    {
        $data['judul'] = 'Member';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->ModelUser->getAllMember();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/v_footer');
    }



    public function booking()
    {
        $data['judul'] = 'Booking';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->getAllBooking();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/booking', $data);
        $this->load->view('templates/v_footer');
    }


    public function invoice()
    {
        $data['judul'] = 'Invoice';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->ModelInvoice->getAllInvoice();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/v_footer');
    }

    public function KonfirmasiInvoice($kode)
    {
        $data['judul'] = 'Invoice';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pembayran'] = $this->ModelInvoice->getInvoiceByKode($kode);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/konfirmasi-pembayaran', $data);
        $this->load->view('templates/v_footer');
    }
}
