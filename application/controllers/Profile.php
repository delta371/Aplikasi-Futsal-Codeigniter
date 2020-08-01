<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelUser']);
        $this->load->model(['ModelBooking']);
        $this->load->model(['ModelInvoice']);
        $this->load->model(['ModelBookingHistori']);
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');



        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('profile/myprofile', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
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
            $this->session->set_flashdata('message', 'Foto Berhasil diubah');
            redirect('profile');
        }
    }

    public function editPassword()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|min_length[8]|trim', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password minimal 8 karakter',
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|min_length[8]|matches[password1]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'tidak cocok dengan New password',
        ]);

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');
        $data['cek_booking'] = $this->ModelBooking->getDataBookingById($id);


        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "EditPassword";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('profile/edit_password', $data);
            $this->load->view('templates/contact');
            $this->load->view('templates/footer');
        } else {
            $old_password = $this->input->post('password');
            $new_password = $this->input->post('password1');

            if (!password_verify($old_password, $data['user']['password'])) {
                $this->session->set_flashdata('error', '
                Old Password tidak cocok');
                redirect('home/editPassword');
            } else {
                if ($old_password == $new_password) {
                    $this->session->set_flashdata('warning', '
                   new password tidak boleh sama dengan old password');
                    redirect('home/editPassword');
                } else {
                    // password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message', 'Password telah diubah!');
                    redirect('profile/editPassword');
                }
            }
        }
    }

    public function ubahTelepon()
    {
        $data['judul'] = 'Ubah Telepon';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');

        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric', [
            'required' => 'Nomer Tidak Boleh Kosong',
            'numeric' => 'Harus Nomer',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('profile/edit-telepon', $data);
            $this->load->view('templates/contact');
            $this->load->view('templates/footer');
        } else {
            $id = $this->session->userdata('id_user');
            $telepon = $this->input->post('telepon');

            $data = [
                'telepon' => $telepon,
            ];

            $this->ModelUser->update_data($id, $data);
            $this->session->set_flashdata('message', 'Telepon Berhasil diubah');
            redirect('profile');
        }
    }

    public function ubahGender()
    {
        $data['judul'] = 'Ubah Gender';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile/edit-gender', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }

    public function ubahGenderAksi()
    {
        $id = $this->session->userdata('id_user');
        $gender = $this->input->post('gender');

        $data = [
            'gender' => $gender,
        ];
        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('message', 'Jenis Kelamin Berhasil diubah');
        redirect('profile');
    }

    public function ubahTglLahir()
    {
        $data['judul'] = 'Ubah Tanggal Lahir';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile/edit-tgllahir', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }

    public function ubahTglLahirAksi()
    {
        $id = $this->session->userdata('id_user');
        $date = $this->input->post('tgl_lahir');

        $data = [
            'tanggal_lahir' => $date,
        ];
        $this->ModelUser->update_data($id, $data);
        $this->session->set_flashdata('message', 'Tanggal Lahir Berhasil diubah');
        redirect('profile');
    }


    public function ubahAlamat()
    {
        $data['judul'] = 'Ubah Alamat';
        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');

        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Tidak Boleh Kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('profile/edit-alamat', $data);
            $this->load->view('templates/contact');
            $this->load->view('templates/footer');
        } else {
            $alamat = $this->input->post('alamat');

            $data = [
                'alamat' => $alamat,
            ];
            $this->ModelUser->update_data($id, $data);
            $this->session->set_flashdata('message', 'Alamat Berhasil diubah');
            redirect('profile');
        }
    }



    public function bookingTransaksi()
    {
        $data['judul'] = "Booking Transaksi";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $kode = $this->session->userdata('id_user');

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');



        $data['booking'] = $this->ModelBooking->getDataBookingById($kode);
        $data['invoice'] = $this->ModelInvoice->getDataInvoiceById($kode);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile/booking-transaksi', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }

    public function bookingHistori()
    {
        $config['base_url'] = 'http://localhost/futsal+/profile/bookingHistori/';
        $config['total_rows'] = $this->ModelBookingHistori->countAllHistoriById();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;


        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



        $data['histori'] = $this->ModelBookingHistori->getDataById($data['page'], $config['per_page']);
        $data['judul'] = "Order History";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        // cek user suda booking atau belum 
        $id = $this->session->userdata('id_user');




        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile/booking-histori', $data);
        $this->load->view('modals/index', $data);
        $this->load->view('templates/contact');
        $this->load->view('templates/footer');
    }
}
