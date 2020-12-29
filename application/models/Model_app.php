<?php 
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }
   

    function tampil_data($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'masuk');
        $query = $this->db->get();
        return $query;
    }

    function tampil_data1($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'keluar');
        $query = $this->db->get();
        return $query;
    }

    function insertBody($username,$status,$tgl,$tujuan,$jumlah){
        $hasil=$this->db->query("INSERT INTO keuangan VALUES(NULL,'$username','$status','$tgl','$tujuan','$jumlah')");
        return $hasil;
    }

    function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }

    function update_data($id_keuangan,$username,$status,$tgl,$tujuan,$jumlah){
        $hasil = $this->db->query("UPDATE keuangan SET username='$username', status='$status', tgl='$tgl', tujuan='$tujuan', jumlah='$jumlah' WHERE id_keuangan='$id_keuangan'");
        return $hasil;
    }

    function hapus_data($id_keuangan){
        $hasil = $this->db->query("DELETE FROM keuangan WHERE id_keuangan='$id_keuangan'");
        return $hasil;

    }
}