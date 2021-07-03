<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get('user')->result_array();
        $data['role'] = $this->db->get('role')->result_array();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('User/User_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function add(){
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
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
        echo "YES";
        }
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role')
        ];
        $this->db->where('id',$id);
        $this->db->update('user',$data);
        redirect('User/User');
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('user');
        redirect('User/User');
    }
}