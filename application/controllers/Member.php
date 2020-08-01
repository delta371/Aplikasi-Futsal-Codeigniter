<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelUser']);
    }

    public function index()
    {
        $this->_login();
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
                    $respon = array(
                        'is_true' => 1,
                        'msg' => 'Anda berhasil login',
                        'icon' => 'success'
                    );
                } else {
                    $respon = array(
                        'is_true' => 0,
                        'msg' => 'password salah !!',
                        'icon' => 'error'
                    );
                }
            } else {
                $respon = array(
                    'is_true' => 0,
                    'msg' => 'user belum di aktivasi!',
                    'icon' => 'info'
                );
            }
        } else {
            $respon = array(
                'is_true' => 0,
                'msg' => 'email tidak terdaftar!!',
                'icon' => 'warning'
            );
        }
        echo json_encode($respon);
    }

    public function daftar()
    {
        $email = $this->input->post('alamat_email', true);
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
            'tanggal_buat' => time()
        ];

        $get_email = $this->db->get_where('users', ['email' => $email])->num_rows();
        if ($get_email > 0) {
            $this->session->set_flashdata('warning', 'Maaf email sudah terdaftar');
            redirect('home');
        } else {
            $this->db->insert('users', $data);
            $this->db->insert('token', $user_token);
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', 'Congratulation! your account has been created. Please activate your account');
            redirect('home');
        }
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
        $this->email->to($this->input->post('alamat_email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'member/verify?email=' . $this->input->post('alamat_email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $message = '
            <!DOCTYPE html>
            <html>
            <head>
            <style>
                .image h1 {
                    color: orange;
                }
            </style>
            </head>
            <body>
                <div class="image">
                    <center>
                        <h1>Futsal+</h1>
                        <p>Simple Way To Your Beloved</p>
                    </center>
                </div>


                <p>Login dengan password : <span style"font-weight: bold;" >12345</span></p>

                <div class="keterangan">
                    <br>
                    <h3>NOTICE :</h3>
                    <p>Di harapkan langsung mengganti password. Demi keamanan akun anda.</p>
                    <p>Terima Kasih</p>
                    <br>
                    <p style="color: black;" >Futsal+</p>
                </div>

            </body>
            </html>
                  
            ';
            $this->email->subject('Reset password');
            $this->email->message($message);
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = rawurldecode(urlencode($this->input->get('token')));

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->ModelUser->cekToken(['token' => $token])->row_array();

            if ($user_token) {

                if (time() - $user_token['tanggal_buat'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');


                    $this->db->delete('token', ['email' => $email]);
                    $this->session->set_flashdata('message', '
                    ' . $email  . ' has been activated! please login.');
                    redirect('home');
                } else {

                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('token', ['email' => $email]);



                    $this->session->set_flashdata('error', 'Account activation failed! Token expired.');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Account activation failed! Token invalid.');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('warning', 'Account activation failed! Wrong email.');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 'Anda telah keluar');
        redirect('home');
    }


    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');


        $email = $this->input->post('alamat_email');
        $user = $this->ModelUser->cekData(['email' => $email, 'is_active' => 1])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'tanggal_buat' => time()
            ];

            $this->db->insert('token', $user_token);
            $this->_sendEmail($token, 'forgot');
            $password = password_hash(12345, PASSWORD_DEFAULT);
            $data = array(
                'password' => $password,
            );
            $this->ModelUser->update_password($email, $data);

            $this->session->set_flashdata('message', 'Silahkan cek email anda');
            redirect('home');
        } else {
            $this->session->set_flashdata('error', 'email tidak terdaftar atau teraktivasi');
            redirect('home');
        }
    }


    public function getMember()
    {
        $email = $_POST['email'];
        $user = $this->db->query("SELECT COUNT(email) FROM users WHERE email = '$email'")->row_array();

        return $user;
    }
}
