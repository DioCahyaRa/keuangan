<?php

class MyModel extends CI_Model {

    public function update_user($data_user,$user){
        $this->db->where('username', $user['username']);
        $this->db->update('user',$data_user);
    }

    // Jenis Transasksi
    public function get_jns_trans(){
        return $this->db->get_where('jns_trans')->result_array();
    }

    public function addJT($data_add){
        $this->db->insert('jns_trans', $data_add);
    }
    
    public function editJT($data_edit,$id){
        $this->db->where('id',$id);
        $this->db->update('jns_trans', $data_edit);
    }
    
    public function deleteJT($id){
        $this->db->where('id',$id);
        $this->db->delete('jns_trans');
    }
    
    // kepada
    public function get_kepada(){
        return $this->db->get_where('tbl_kepada')->result_array();
    }
    
    public function addkepada($data_add){
        $this->db->insert('tbl_kepada', $data_add);
    }
    
    public function editkepada($data_edit,$id){
        $this->db->where('id',$id);
        $this->db->update('tbl_kepada', $data_edit);
    }

    public function deletekepada($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_kepada');
    }

    // Surat
    
    public function get_surat_pembayaran(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_surat',['masuk_keluar' => 'Keluar'])->result_array();
    }

    public function get_surat_pemasukan(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_surat',['masuk_keluar' => 'Masuk'])->result_array();
    }

    function get_no_surat(){
        // $this->db->query("SELECT MAX(RIGHT(no_surat,4)) AS kd_max FROM tbl_surat");
        // $this->db->where('date', time());
        $today = date('dmy',time());
        $q = $this->db->query("SELECT MAX(RIGHT(no_surat,4)) AS kd_max FROM tbl_surat WHERE LEFT(no_surat,6) = $today");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("/%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

    // Dashboard

    // KABAG
    public function CountAlert(){
        $this->db->count_all_results('tbl_surat');
        $this->db->where('status','UNAPPROVED KABAG');
        $this->db->where('masuk_keluar','Masuk');
        $this->db->from('tbl_surat');
        return $this->db->count_all_results();
    }

    public function CountAlert2(){
        $this->db->count_all_results('tbl_surat');
        $this->db->where('status','UNAPPROVED KABAG');
        $this->db->where('masuk_keluar','Keluar');
        $this->db->from('tbl_surat');
        return $this->db->count_all_results();
    }

    // KETUA
    public function CountAlert_ketua(){
        $this->db->count_all_results('tbl_surat');
        $this->db->where('status','UNAPPROVED KETUA');
        $this->db->where('masuk_keluar','Masuk');
        $this->db->from('tbl_surat');
        return $this->db->count_all_results();
    }

    public function CountAlert2_ketua(){
        $this->db->count_all_results('tbl_surat');
        $this->db->where('status','UNAPPROVED KETUA');
        $this->db->where('masuk_keluar','Keluar');
        $this->db->from('tbl_surat');
        return $this->db->count_all_results();
    }

    // WAKET II
    public function CountAlert2_waket2(){
        $this->db->count_all_results('tbl_surat');
        $this->db->where('status','UNAPPROVED WAKET II');
        $this->db->where('masuk_keluar','Keluar');
        $this->db->from('tbl_surat');
        return $this->db->count_all_results();
    }


    // Anggaran
    public function add_anggaran($data_add){
        $this->db->insert('anggaran', $data_add);
    }
    public function sisa_anggaran($hasil_anggaran, $get_pos){
        $this->db->where('pos',$get_pos);
        $this->db->update('anggaran',['sisa_anggaran'=>$hasil_anggaran]);
    }
    
    public function get_nama_pos($jns_trans){
        return $this->db->get_where('tbl_pos',['jns_trans' => $jns_trans])->result();
    }

    // Laporan
    public function kas_keluar(){
        $today = date('dmy',time());
        $q = $this->db->query("SELECT MAX(RIGHT(no_kas,4)) AS kd_max FROM laporan WHERE LEFT(no_kas,6) = $today");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("/kk/%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

    public function kas_masuk(){
        $today = date('dmy',time());
        $q = $this->db->query("SELECT MAX(RIGHT(no_kas,4)) AS kd_max FROM laporan WHERE LEFT(no_kas,6) = $today");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("/km/%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

    public function getLaporan(){
        $this->db->order_by('id_laporan', 'DESC');
        return $this->db->get('laporan')->result_array();
    }

    // to PDF Laporan Harian
    public function laporan_harian($date){
        $this->db->join('laporan','laporan.no_surat=tbl_surat.no_surat');
        $this->db->from('tbl_surat');
        $this->db->join('tbl_kas','tbl_kas.no_kas=laporan.no_kas');
        $this->db->where('tbl_surat.status','APPROVED');
        $this->db->where('tbl_surat.date', $date);
        return $this->db->get();
    }

    public function count_debit(){
        $date = date('d-M-Y',time());
        $this->db->select_sum('nominal');
        $this->db->where('masuk_keluar','Masuk');
        $this->db->where('date',$date);
        return $this->db->get('tbl_surat');
    }

    public function count_kredit(){
        $date = date('d-M-Y',time());
        $this->db->select_sum('nominal');
        $this->db->where('masuk_keluar','kredit');
        $this->db->where('date',$date);
        return $this->db->get('tbl_surat');
    }

    // Kas
    public function getKas(){
        $this->db->order_by('id_kas', 'DESC');
        return $this->db->get('tbl_kas')->result_array();
    }

    public function saldo_kas(){
        return $query = $this->db->query("SELECT saldo FROM tbl_kas ORDER BY id_kas DESC LIMIT 1");
    }

}