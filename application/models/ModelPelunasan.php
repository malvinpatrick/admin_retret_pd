<?php
class modelPelunasan extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->database();
        //SET TIME ZONE
        date_default_timezone_set("Asia/Jakarta");
    }
    function queryLunasModal(){
        $query = $this->db->query("select d.nama as nama, d.nrp as nrp, d.jenis_kelamin as jk, j.nama_jurusan as jurusan, d.id_line as line from dataregister d, jurusan j,   pelunasan p where d.id_jurusan = j.id_jurusan and p.nrp = d.nrp");
        return $query->result();
    }

    function queryNonLunasModal(){
        $query = $this->db->query("select d.nama as nama, d.nrp as nrp, d.jenis_kelamin as jk, j.nama_jurusan as jurusan, d.no_hp as notelp, d.id_line as line from dataregister d left join pelunasan p on d.nrp = p.nrp inner join jurusan j on j.id_jurusan = d.id_jurusan where p.nrp is null ");
        return $query->result();
    }

    function insertPelunasanModel($nrp){
        $date = date('d-m-Y');

        $dbdata = array(
            "status_regis" => 0,
            'nrp' => $nrp
        );
        $this->db->set('tanggal_lunas', "STR_TO_DATE('".$date."','%d-%m-%Y')", FALSE);
        $this->db->insert('pelunasan', $dbdata);
    }
    function deletePelunasanModel($nrp){
        $this->db->where('nrp', $nrp);
        $this->db->delete('pelunasan');
    }
    function getPelunasan($nrp){
        $query = $this->db->query("SELECT count(*) as jumlah FROM pelunasan WHERE nrp='".$nrp."'");
        return $query->result();
    }
    function cekRegister($nrp){
        return $this->db->query("select count(*) as jumlah from dataregister where nrp='".$nrp."'");
    }

    function getEmail($nrp){
        $query = $this->db->query("SELECT email FROM dataregister WHERE nrp='".$nrp."'");
        return $query->result();
    }
}








?>