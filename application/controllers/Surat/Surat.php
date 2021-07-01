<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('MyModel');
    }

    public function index(){
        $data['jns_transaksi'] = $this->MyModel->get_jns_trans();
        $data['no_surat']= $this->MyModel->get_no_surat();
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['bagian'] = $this->db->get('tbl_bagian')->result_array();
        $data['title'] = 'Surat Pemasukan & Pengeluaran';
        $data['surat'] = $this->MyModel->get_surat();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Surat/Surat_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function addSurat(){
        $no_surat = $this->input->post('no_surat');
        $jns_surat = $this->input->post('jns_surat');
        $msk_klr = $this->input->post('msk_klr');
        $kepada = $this->input->post('kepada');
        $pos = $this->input->post('pos');
        $cr_pem = $this->input->post('cr_pem');
        $nominal = $this->input->post('nominal');
        $terbilang = $this->input->post('terbilang');
        $uraian = $this->input->post('uraian');

        $data = [
            'no_surat' => $no_surat,
            'jns_surat' => $jns_surat,
            'masuk_keluar' => $msk_klr,
            'kepada' => $kepada,
            'pos_anggaran' => $pos,
            'cara_pembayaran' => $cr_pem,
            'nominal' => $nominal,
            'terbilang' => $terbilang,
            'uraian' => $uraian
        ];

        $this->db->insert('tbl_surat', $data);
        redirect('Surat/surat');
    }
}