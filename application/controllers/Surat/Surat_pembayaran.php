<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_pembayaran extends CI_Controller {
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
        $data['jns_biaya'] = $this->db->get('jns_biaya')->result_array();
        $data['title'] = 'Surat Pembayaran';
        $data['surat'] = $this->MyModel->get_surat_pembayaran();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Surat/Surat_pembayaran_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function addSurat(){
        $no_surat = $this->input->post('no_surat');
        $jns_biaya = $this->input->post('jns_biaya');
        $msk_klr = $this->input->post('msk_klr');
        $kepada = $this->input->post('kepada');
        $pos = $this->input->post('pos');
        $cr_pem = $this->input->post('cr_pem');
        $nominal = $this->input->post('nominal');
        $terbilang = $this->input->post('terbilang');
        $uraian = $this->input->post('uraian');

        $data = [
            'no_surat' => $no_surat,
            'jns_biaya' => $jns_biaya,
            'masuk_keluar' => 'Keluar',
            'kepada' => $kepada,
            'pos_anggaran' => $pos,
            'cara_pembayaran' => $cr_pem,
            'nominal' => $nominal,
            'terbilang' => $terbilang,
            'uraian' => $uraian,
            'date' => time(),
            'status' => 'UNAPPROVED KABAG'
        ];

        $this->db->insert('tbl_surat', $data);
        redirect('Surat/Surat_pembayaran');
    }

    public function to_PDF(){
        $this->load->library('pdf');
        $id = $this->input->post('id');
        $data['data'] = $this->db->get_where('tbl_surat', ['id'=>$id])->result_array();
        $data['jabatan'] = $this->db->get('tbl_bagian')->result_array();
        $html = $this->load->view('Surat/Pdf_v', $data, true);
        $filename = 'report_'.time();
        $this->pdf->generate($html, $filename, true, 'A4', 'landscape');
       
    }
}