<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['title'] = 'Anggaran';
        $data['anggaran'] = $this->db->get('anggaran')->result_array();
        $data['jns_transaksi'] = $this->MyModel->get_jns_trans();
        $data['pos'] = $this->db->get('tbl_pos')->result_array();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Master/Anggaran_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function add(){
        $jns_trans = $this->input->post('jns_trans');
        $pos = $this->input->post('pos');
        $anggaran = $this->input->post('anggaran');
        $tahun = $this->input->post('tahun');
        
        $data_add = [
            'jns_trans' => $jns_trans,
            'pos' => $pos,
            'anggaran' => $anggaran,
            'tahun' => $tahun,
            'status' => 'Ok'
        ];

        $this->MyModel->add_anggaran($data_add);
        redirect('Master/Anggaran');
    }
}
