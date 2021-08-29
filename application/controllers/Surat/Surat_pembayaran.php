<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_pembayaran extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('MyModel');
    }

    public function index(){ 
        $data['pos'] = $this->db->get('tbl_pos')->result_array();
        $data['no_surat']= $this->MyModel->get_no_surat();
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $data['bagian'] = $this->db->get('tbl_kepada')->result_array();
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

        // anggaran
        $get_pos = $data['data'][0]['pos_anggaran'];
        $data['realisasi'] = $data['data'][0]['nominal'];
        $data_anggaran = $this->db->get_where('anggaran',['pos' => $get_pos])->result_array();
        $data['anggaran'] = $data_anggaran[0]['anggaran'];
        $data['sisa_anggaran'] = $data_anggaran[0]['sisa_anggaran'];

        $data['jabatan'] = $this->db->get('tbl_kepada')->result_array();
        $html = $this->load->view('Surat/Pdf_v', $data, true);
        $filename = 'report_'.time();
        $this->pdf->generate($html, $filename, true, 'A4', 'landscape');  
    }

    
    public function Approved_kabag($id){
        $data = [
            'status' => 'UNAPPROVED WAKET II'
        ];
        $this->db->where('id',$id);
        $this->db->update('tbl_surat',$data);
        redirect('Surat/Surat_pembayaran');
    }

    public function Approved_waket2($id){
        $data = [
            'status' => 'UNAPPROVED KETUA'
        ];
        $this->db->where('id',$id);
        $this->db->update('tbl_surat',$data);
        redirect('Surat/Surat_pembayaran');
    }

    public function Approved_ketua($id){
        $data_surat = $this->db->get_where('tbl_surat',['id'=>$id])->result_array();
        if($data_surat[0]['masuk_keluar'] == 'Keluar'){
            $no_kas = $this->MyModel->kas_keluar();
        }
        $data_kas = [
            'no_kas' => $no_kas,
            'no_surat' => $data_surat[0]['no_surat'],
            'nama_kas' => $data_surat[0]['pos_anggaran'],
            'kredit' => (int)$data_surat[0]['nominal'],
            'date' => time()
        ];
        $this->db->insert('laporan', $data_kas);

        $get_pos = $data_surat[0]['pos_anggaran'];
        $data_anggaran = $this->db->get_where('anggaran',['pos' => $get_pos])->result_array();
        $sisa_anggaran = $data_anggaran[0]['sisa_anggaran'];
        $get_pengeluaran = $data_surat[0]['nominal'];
        $hasil_anggaran = $sisa_anggaran - $get_pengeluaran;
        $this->MyModel->sisa_anggaran($hasil_anggaran,$get_pos);
        

        $data = [
            'status' => 'APPROVED'
        ];
        $this->db->where('id',$id);
        $this->db->update('tbl_surat',$data);

        
        redirect('Surat/Surat_pembayaran');
    }

    public function Canceled($id){
        $data = [
            'status' => 'CANCELED'
        ];
        $this->db->where('id',$id);
        $this->db->update('tbl_surat',$data);
        redirect('Surat/Surat_pembayaran');
    }

    public function catatanSurat(){
        $no_surat = $this->input->post('no_surat');

        $data = [
            'catatan' => $this->input->post('catatan')
        ];

        $this->db->where('no_surat',$no_surat);
        $this->db->update('tbl_surat',$data);
        redirect('Surat/Surat_pembayaran');
    }

    public function editSurat(){
        $no_surat = $this->input->post('no_surat');
        $jns_biaya = $this->input->post('jns_biaya');
        $kepada = $this->input->post('kepada');
        $pos = $this->input->post('pos');
        $cr_pem = $this->input->post('cr_pem');
        $nominal = $this->input->post('nominal');
        $terbilang = $this->input->post('terbilang');
        $uraian = $this->input->post('uraian');
        $catatan = $this->input->post('catatan');
        $data = [
            'jns_biaya' => $jns_biaya,
            'kepada' => $kepada,
            'pos_anggaran' => $pos,
            'cara_pembayaran' => $cr_pem,
            'nominal' => $nominal,
            'terbilang' => $terbilang,
            'uraian' => $uraian,
            'date' => time(),
            'catatan' => $catatan
        ];

        $this->db->where('no_surat', $no_surat);
        $this->db->update('tbl_surat', $data);
        redirect('Surat/Surat_pembayaran');
    }

    
}