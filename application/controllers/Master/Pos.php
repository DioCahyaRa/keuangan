<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Pos';
        $data['jns_trans'] = $this->MyModel->get_jns_trans();
        $data['pos'] = $this->db->get('tbl_pos')->result_array();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Pos_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function add(){
        $jns_trans = $this->input->post('jns_trans');
        $pos = $this->input->post('pos');
        
        $data_add = [
            'jns_trans' => $jns_trans,
            'nama_pos' => $pos,
        ];
        $this->db->insert('tbl_pos',$data_add);
        redirect('Master/Pos');
    }

    public function edit(){
        $jns_trans = $this->input->post('jns_trans');
        $id = $this->input->post('id');
        $pos = $this->input->post('pos');
        
        $data_edit = [
            'jns_trans' => $jns_trans,
            'nama_pos' => $pos,
        ];
        
        $this->db->where('id',$id);
        $this->db->update('tbl_pos',$data_edit);
        redirect('Master/Pos');
    }

    public function delete(){
        $id = $this->input->post('id');

        $this->db->where('id',$id);
        $this->db->delete('tbl_pos');
        redirect('Master/Pos');
    }
}
