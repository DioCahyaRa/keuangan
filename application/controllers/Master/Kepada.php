<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepada extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Pihak ke 3';
        $data['kepada'] = $this->MyModel->get_kepada();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Kepada_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function addkepada(){
        $bagian = $this->input->post('bagian');
        $nama = $this->input->post('nama');
        
        $data_add = [
            'bagian' => $bagian,
            'nama' => $nama
        ];

        $this->MyModel->addkepada($data_add);
        redirect('Master/Kepada');
    }

    public function editkepada(){
        $bagian = $this->input->post('bagian');
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        
        $data_edit = [
            'bagian' => $bagian,
            'nama' => $nama
        ];
        
        $this->MyModel->editkepada($data_edit,$id);
        redirect('Master/Kepada');
    }

    public function deletekepada(){
        $id = $this->input->post('id');

        $this->MyModel->deletekepada($id);
        redirect('Master/Kepada');
    }
}