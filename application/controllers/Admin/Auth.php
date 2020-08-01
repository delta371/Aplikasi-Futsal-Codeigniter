<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus Email'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Login Admin';
            $this->load->view('templates/v_header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/v_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        // Jika usernya ada
        if ($user) {
            // Jika usernya sudah aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user'],
                        'name' => $user['nama']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                      Anda tidak memiliki akses!
                      </div>');
                        redirect('admin/auth');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password salah
                  </div>');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
               User belum diaktifasi
              </div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Email tidak terdaftar !!
          </div>');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda telah keluar!  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('home');
    }
}
