<?php

class MyModel extends CI_Model {

    public function update_user($data_user){
        $this->db->where('email', $data_user['email']);
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
    
    // Bagian
    public function get_bagian(){
        return $this->db->get_where('tbl_bagian')->result_array();
    }
    
    public function addBagian($data_add){
        $this->db->insert('tbl_bagian', $data_add);
    }
    
    public function editBagian($data_edit,$id){
        $this->db->where('id',$id);
        $this->db->update('tbl_bagian', $data_edit);
    }

    public function deleteBagian($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_bagian');
    }

    // Surat
    
    public function get_surat(){
        return $this->db->get_where('tbl_surat')->result_array();
    }

    function get_no_surat(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_surat,4)) AS kd_max FROM tbl_surat WHERE DATE(date)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("/%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }

}