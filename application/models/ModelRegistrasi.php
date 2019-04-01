<?php
class modelRegistrasi extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->database();
    }

    function queryRegisModal(){
        $query = $this->db->query("select d.nama as nama, d.nrp as nrp, d.jenis_kelamin as jk, j.nama_jurusan as jurusan from dataregister d, pelunasan p, jurusan j where d.id_jurusan = j.id_jurusan and p.nrp = d.nrp and p.status_regis = 1");
        return $query->result();
    }

    function queryNonRegisModal(){
            $query = $this->db->query("select d.nama as nama, d. nrp as nrp, d.jenis_kelamin as jk, j.nama_jurusan as jurusan from dataregister d, pelunasan p, jurusan j where d.id_jurusan = j.id_jurusan and p.nrp = d.nrp and p.status_regis = 0");
        return $query->result();
    }

    function insertRegistrasiModel($nrp){
        $this->db->where('nrp', $nrp);
        $dbdata = array(
            "status_regis" => 1,
        );
        $this->db->update('pelunasan', $dbdata);
    }

    function getPelunasan($nrp){
        $query = $this->db->query("SELECT count(*) as jumlah FROM pelunasan WHERE nrp='".$nrp."'");
        return $query->result();
    }

    function getRegistrasi($nrp){
        $query = $this->db->query("SELECT status_regis from pelunasan where nrp = '".$nrp."'");
        return $query->result();
    }

    function deleteRegistrasiModel($nrp){
        $this->db->where('nrp', $nrp);
        $dbdata = array(
            "status_regis" => 0,
        );
        $this->db->update('pelunasan', $dbdata);
    }
}


?>