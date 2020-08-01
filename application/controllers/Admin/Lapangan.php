<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        get_Menu();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }


    public function getKodeLapangan()
    {
        //Mengambil tahun
        $lastKode = $this->ModelLapangan->getMaxByKode()->row_array();
        $kode = $lastKode['kd_lapangan'];

        //nourut
        $noUrut = substr($kode, 3, 1);
        $tambah = (int) $noUrut + 1;


        $newKode = "LAP" . $tambah;
        return $newKode;
    }

    public function index()
    {
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        //config
        $config['base_url'] = 'http://localhost/futsal+/admin/lapangan/index/';
        $this->db->like('nm_lapangan', $data['keyword']);
        $this->db->from('lapangan');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;
        $data['total_rows'] = $config['total_rows'];
        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['lapangan'] = $this->ModelLapangan->getLapanganLimit($config['per_page'], $data['page'], $data['keyword']);
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
                'kd_lapangan' => $this->getKodeLapangan(),
                'nm_lapangan' => $nama,
                'keterangan' => $keterangan,
                'image' => $image
            );

            $this->ModelLapangan->input_data($data);


            $this->session->set_flashdata('pesan', 'Lapangan berhasil di tambahkan');
            redirect('admin/lapangan');
        }
    }

    public function hapusLapangan($data)
    {
        $this->ModelLapangan->hapusLapangan($data);
        $this->session->set_flashdata('pesan', 'di Hapus');
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

        if (!empty($image)) {
            $data = [
                'kd_lapangan' => $kode,
                'nm_lapangan' => $nama,
                'keterangan' => $keterangan,
                'image' => $image,
            ];
        } else {
            $data = [
                'kd_lapangan' => $kode,
                'nm_lapangan' => $nama,
                'keterangan' => $keterangan,
            ];
        }

        $this->ModelLapangan->ubahLapangan($kode, $data);
        $this->session->set_flashdata('pesan', 'Lapangan berhasil di ubah');
        redirect('admin/lapangan');
    }
}
