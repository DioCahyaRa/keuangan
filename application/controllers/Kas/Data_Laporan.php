<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Laporan extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
    }

    public function index(){
        $data['user_ses'] = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
        $kas = $this->db->get('tbl_kas')->result_array();
        if ($kas) {
            foreach($kas as $k){
                $data['saldo'] = $k['saldo'];
            }
        }else{
            $data['saldo'] = '0';
        }
        $data['title'] = 'Data Laporan';
        $data['laporan'] = $this->MyModel->getLaporan();
        $this->load->view('Template/Header_v.php',$data);
        $this->load->view('Kas/Data_laporan_v.php',$data);
        $this->load->view('Template/Footer_v.php');
    }

    public function to_pdf_harian(){
        $this->load->library('pdf');
        $date = date('d-M-Y',time());
        $data['date'] = $date;
        $data['data_laporan'] = $this->MyModel->laporan_harian($date)->result_array();
        $data['saldo'] = $data['data_laporan'][0]['saldo'];

        // count debit
        $count_debit = $this->MyModel->count_debit()->result_array();
        $hasil_debit = (int)$count_debit[0]['nominal'];
        $data['debit'] = $hasil_debit;

        // count kredit
        $count_kredit = $this->MyModel->count_kredit()->result_array();
        $hasil_kredit = (int)$count_kredit[0]['nominal'];
        $data['kredit'] = $hasil_kredit;
        
        $saldo_akhir = $hasil_debit - $hasil_kredit;
        $data['saldo_akhir'] = $saldo_akhir;

        $html = $this->load->view('Kas/Pdf_laporan_harian', $data, true);
        $filename = 'report_'.time();
        $this->pdf->generate($html, $filename, true, 'A4', 'landscape');
    }
}
