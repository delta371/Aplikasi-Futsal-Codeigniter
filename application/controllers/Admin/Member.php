<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
        $data['judul'] = 'Member';
        $data['menu'] = $this->Admin_model->getMenu();
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        //ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        // //config
        $config['base_url'] = 'http://localhost/futsal+/admin/member/index/';
        $this->db->where('role_id', 2);
        $this->db->like('nama', $data['keyword']);
        $this->db->from('users');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 2;
        $data['total_rows'] = $config['total_rows'];
        //initialize
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['member'] = $this->ModelUser->getMemberLimit($data['page'], $config['per_page'], $data['keyword']);
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('templates/v_sidebar', $data);
        $this->load->view('modals/modal-admin', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambahMember()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'tanggal_buat' => date('Y-m-d'),
            'image' => 'default.jpg'
        ];

        // siapkan token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'tanggal_buat' => date('Y-m-d')
        ];

        $this->db->insert('users', $data);
        $this->db->insert('token', $user_token);

        $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('pesan', '
           di Buat, silahkan aktivasi');
        redirect('admin/member');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'mamanfams371@gmail.com',
            'smtp_pass' => 'ridwanbw',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('mamanfams371@gmail.com', 'Futsal+');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'member/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'member/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset password</a>');
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function hapusMember($id)
    {
        $this->ModelUser->hapusUser($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/member');
    }
}
