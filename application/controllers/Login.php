<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
    }
    
	public function index()
	{
        if($this->session->userdata('username')){
            redirect('Page/Dashboard');
        }else{
            $this->load->view('Login_v');
        }
    }
    
    public function Daftar(){
        $this->load->view('Daftar_v');
    }

    public function Regis(){
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Daftar_v');
        }else{

        $data_user = [
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password,PASSWORD_DEFAULT),
            'role' => 'Account'
        ];

        $this->db->insert('user', $data_user,$email);
        $this->session->set_flashdata('msg-succcess','<script>Swal.fire("","SignUp Success","success")</script>');
        redirect('Login');
        }
    }

    public function action_login(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $this->load->view('Login_v');
        }else{
            // validasi sukses
            $this->_login();
        }

    }

    public function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_user = $this->db->get_where('user',['username'=>$username])->row_array();
        if($cek_user) {
            if (password_verify($password, $cek_user['password'])) {
                $data_user = [
                    'nama' => $cek_user['nama'],
                    'username' => $cek_user['username'],
                    'email' => $cek_user['email'],
                    'role' => $cek_user['role']
                ];
                $this->session->set_userdata($data_user);
                $this->session->set_flashdata('msg-succcess','<script>Swal.fire("","Success Login","success")</script>');
                redirect('Page/Dashboard');
            }else{
                $this->session->set_flashdata('msg-succcess','<script>Swal.fire("","Username atau Password Salah","error")</script>');
                redirect('Login');
            }
        }else{
            $this->session->set_flashdata('msg-succcess','<script>Swal.fire("","Username Belum Terdaftar","error")</script>');
            redirect('Login');
        }
        
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg-succcess','<script>Swal.fire("","Success Logout","success")</script>');
        redirect('Login');
    }



    
}


