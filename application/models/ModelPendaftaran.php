<?php
class modelPendaftaran extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->database();
    }

    function queryAllData(){
        $query = $this->db->query("SELECT d.nrp AS NRP, d.nama AS NAMA, j.nama_jurusan AS JURUSAN, d.id_line AS LINE, d.jenis_kelamin as jk, d.alergi as alergi FROM dataregister d, jurusan j WHERE d.id_jurusan = j.id_jurusan");
        return $query->result();
    }
}


?>