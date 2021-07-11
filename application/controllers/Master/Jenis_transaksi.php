<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_transaksi extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Jenis Transaksi';
        $data['jns_trans'] = $this->MyModel->get_jns_trans();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Jns_trans_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function addJT(){
        $jns_trans = $this->input->post('jns_trans');
        
        $data_add = [
            'jns_trans' => $jns_trans,
        ];

        $this->MyModel->addJT($data_add);
        redirect('Master/Jenis_transaksi');
    }

    public function editJT(){
        $jns_trans = $this->input->post('jns_trans');
        $id = $this->input->post('id');
        
        $data_edit = [
            'jns_trans' => $jns_trans,
        ];
        
        $this->MyModel->editJT($data_edit,$id);
        redirect('Master/Jenis_transaksi');
    }

    public function deleteJT(){
        $id = $this->input->post('id');

        $this->MyModel->deleteJT($id);
        redirect('Master/Jenis_transaksi');
    }
}
