<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_biaya extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Jenis Biaya';
        $data['jns_biaya'] = $this->db->get('jns_biaya')->result_array();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Jns_biaya_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function add_JB(){
        $data = [
            'jns_biaya' => $this->input->post('jns_biaya')
        ];
        $this->db->insert('jns_biaya',$data);
        redirect('Master/Jenis_biaya');
    }

    public function edit_JB(){
        $id = $this->input->post('id');
        $data = [
            'jns_biaya' => $this->input->post('jns_biaya')
        ];
        $this->db->where('id',$id);
        $this->db->update('jns_biaya',$data);
        redirect('Master/Jenis_biaya');
    }

    public function delete_JB(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('jns_biaya');
        redirect('Master/Jenis_biaya');
    }
}