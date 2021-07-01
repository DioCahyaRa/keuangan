<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Bagian';
        $data['bagian'] = $this->MyModel->get_bagian();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Bagian_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function addBagian(){
        $bagian = $this->input->post('bagian');
        $nama = $this->input->post('nama');
        
        $data_add = [
            'bagian' => $bagian,
            'nama' => $nama
        ];

        $this->MyModel->addBagian($data_add);
        redirect('Master/Bagian');
    }

    public function editBagian(){
        $bagian = $this->input->post('bagian');
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        
        $data_edit = [
            'bagian' => $bagian,
            'nama' => $nama
        ];
        
        $this->MyModel->editBagian($data_edit,$id);
        redirect('Master/Bagian');
    }

    public function deleteBagian(){
        $id = $this->input->post('id');

        $this->MyModel->deleteBagian($id);
        redirect('Master/Bagian');
    }
}