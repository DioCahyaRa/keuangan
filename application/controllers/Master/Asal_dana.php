<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asal_dana extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Asal Dana';
        $data['asal_dana'] = $this->db->get('asal_dana')->result_array();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Asal_dana_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function add(){
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp')
        ];
        $this->db->insert('asal_dana',$data);
        redirect('Master/Asal_dana');
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp')
        ];
        $this->db->where('id',$id);
        $this->db->update('asal_dana',$data);
        redirect('Master/Asal_dana');
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('asal_dana');
        redirect('Master/Asal_dana');
    }
}