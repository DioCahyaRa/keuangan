<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Pages/Profile_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function update_profile(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['user_ses'] = $this->session->userdata();
            $data['title'] = 'Profile';
            $this->load->view('Template/Header_v.php',$data);
            $this->load->view('Pages/Profile_v.php',$data);
            $this->load->view('Template/Footer_v.php');
        }else{
            $name = $this->input->post('nama');
            $email = $this->input->post('email');

            $data_update = [
                'nama' => $name,
                'email' => $email
            ];

            $this->MyModel->update_user($data_update);
            redirect('Page/Dashboard');
        }
    }
}