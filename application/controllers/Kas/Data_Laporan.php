<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Laporan extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('MyModel');
        date_default_timezone_set('Asia/Jakarta'); // Defined City For Timezone
        $this->load->library('pdf');
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
        $date = date("Y-m-d");
        $data['date'] = $date;
        $data['data_laporan'] = $this->MyModel->laporan_harian($date)->result_array();
        // var_dump($data['data_laporan']);die;
        $saldo_sblm = $this->MyModel->laporan_saldo()->result_array();
        var_dump($saldo_sblm);die;
        if ($saldo_sblm) {
            $data['saldo_sebelumnya'] = (int)$saldo_sblm[0]['saldo'];
        }else{
            $data['saldo_sebelumnya'] = 0;
        }

        if ($data['data_laporan']) {
        $data['saldo'] = $data['data_laporan'][0]['saldo'];
        

        // count debit
        $count_debit = $this->MyModel->count_debit()->result_array();
        $hasil_debit = (int)$count_debit[0]['nominal'];
        $data['debit'] = $hasil_debit;
        

        // count kredit
        $count_kredit = $this->MyModel->count_kredit()->result_array();
        $hasil_kredit = (int)$count_kredit[0]['nominal'];
        $data['kredit'] = $hasil_kredit;
        
        $saldo_akhir = $data['saldo_sebelumnya'] + $hasil_debit - $hasil_kredit;
        $data['saldo_akhir'] = $saldo_akhir;
        // var_dump($data['saldo_akhir']);die;

        $html = $this->load->view('Kas/Pdf_laporan_harian', $data, true);
        $filename = 'report_'.time();
        $this->pdf->generate($html, $filename, true, 'A4', 'landscape');
        }else{
            redirect('Kas/Data_laporan/index');
        }
        
    }

    public function pdf_perTanggal(){
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $date = date("Y-m-d");
        $data['date'] = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date' => $date
        ];

        $saldo_sblm = $this->MyModel->laporan_saldo()->result_array();
        if ($saldo_sblm) {
            $data['saldo_sebelumnya'] = (int)$saldo_sblm[0]['saldo'];
        }else{
            $data['saldo_sebelumnya'] = 0;
        }

        $data['data_laporan'] = $this->MyModel->to_pdf($start_date,$end_date);

        if ($data['data_laporan']) {
            $data['saldo'] = $data['data_laporan'][0]['saldo'];
    
            // count debit
            $count_debit = $this->MyModel->count_debit()->result_array();
            $hasil_debit = (int)$count_debit[0]['nominal'];
            $data['debit'] = $hasil_debit;
            
    
            // count kredit
            $count_kredit = $this->MyModel->count_kredit()->result_array();
            $hasil_kredit = (int)$count_kredit[0]['nominal'];
            $data['kredit'] = $hasil_kredit;
            
            $saldo_akhir = $data['saldo_sebelumnya'] + $hasil_debit - $hasil_kredit;
            $data['saldo_akhir'] = $saldo_akhir;
    
            $html = $this->load->view('Kas/Pdf_laporan', $data, true);
            $filename = 'report_'.time();
            $this->pdf->generate($html, $filename, true, 'A4', 'landscape');
            }else{
                redirect('Kas/Data_laporan/index');
            }

    }
}
