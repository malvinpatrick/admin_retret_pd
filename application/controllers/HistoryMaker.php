<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryMaker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->database();
        if($this->session->userdata('email') != 'retretpd2018@gmail.com'){
            redirect('');
        }
	}

	public function index()
	{
		$this->load->view('header-admin');
		$this->load->view('data-regis');
	}

    public function Pendaftaran()
    {
        $this->load->view('header-admin');
        $this->load->view('data-regis');
    }

    public function Pelunasan()
    {
        $this->load->view('header-admin');
        $this->load->view('view_pelunasan');
    }

    public function RegistrasiUlang()
    {
        $this->load->view('header-admin');
        $this->load->view('view_registrasi');
    }

    public function reloadData(){
        //LOAD MODEL FOR ARTIKEL
        $this->load->model('ModelPendaftaran');

        //QUERY ARTIKEL ADMIN
        $data = $this->ModelPendaftaran->queryAllData();
        echo json_encode($data);
    }

    //REGISTRASI
    public function querySudahRegis(){
        $this->load->model('ModelRegistrasi');
        $data = $this->ModelRegistrasi->queryRegisModal();
        echo json_encode($data);
    }

    public function queryBelumRegis(){
        $this->load->model('ModelRegistrasi');
        $data = $this->ModelRegistrasi->queryNonRegisModal();
        echo json_encode($data);
    }

    public function insertRegistrasi(){
        $this->load->model('ModelRegistrasi');
        $nrp = $this->input->post("nrp-insert");

        $data = $this->ModelRegistrasi->getPelunasan($nrp);
        $count = null;
        //GET NRP FROM QUERY
        foreach ($data as $i){
            $count = $i->jumlah;
        }
        if($count == 0){
            echo "BELUM MELAKUKAN PELUNASAN / PENDAFTARAN !!!";
        }else{
            $this->ModelRegistrasi->insertRegistrasiModel($nrp);
            echo $nrp." BERHASIL REGISTRASI ULANG !!!";
        }
    }

    public function deleteRegistrasi(){
        $this->load->model('ModelRegistrasi');
        $nrp = $this->input->post("nrp-delete");

        $data = $this->ModelRegistrasi->getRegistrasi($nrp);
        $statusRegis = null;
        //GET NRP FROM QUERY
        foreach ($data as $i){
            $statusRegis = $i->status_regis;
        }
        if($statusRegis == 0){
            echo "DATA BELUM MELAKUKAN REGISTRASI ULANG / PENDAFTARAN !!!";
        }else{
            $this->ModelRegistrasi->deleteRegistrasiModel($nrp);
            echo $nrp." BERHASIL DIHAPUS PELUNASAN !!!";
        }
    }

    public function exportSudahRegis(){
        $this->load->model('ModelRegistrasi');
        $data = $this->ModelRegistrasi->queryRegisModal();

        $text = "No.,Nama,NRP,JK,Jurusan";
        $text .= "
        ";
        $index = 1;
        foreach($data as $i){
            $text .= $index.",".$i->nama.",".$i->nrp.",".$i->jk.",".$i->jurusan."
            ";
            $index++;
        }
        header("Content-type: text/x-csv");
        header("Content-Disposition: attachment; filename=DATA_REGIS.csv");
        echo($text);
    }

    public function exportSudahLunas(){
        $this->load->model('ModelPelunasan');
        $data = $this->ModelPelunasan->queryLunasModal();

        $text = "No.,Nama,NRP,JK,Jurusan";
        $text .= "
        ";
        $index = 1;
        foreach($data as $i){
            $text .= $index.",".$i->nama.",".$i->nrp.",".$i->jk.",".$i->jurusan."
            ";
            $index++;
        }
        header("Content-type: text/x-csv");
        header("Content-Disposition: attachment; filename=DATA_LUNAS.csv");
        echo($text);
    }
	
	public function exportBelumLunas(){
        $this->load->model('ModelPelunasan');
        $data = $this->ModelPelunasan->queryNonLunasModal();

        $text = "No.,Nama,NRP,JK,Jurusan, No. HP, Line";
        $text .= "
        ";
        $index = 1;
        foreach($data as $i){
            $text .= $index.",".$i->nama.",".$i->nrp.",".$i->jk.",".$i->jurusan.",".$i->notelp.",".$i->line."
			";
            $index++;
        }
        header("Content-type: text/x-csv");
        header("Content-Disposition: attachment; filename=DATA_BLM_LUNAS.csv");
        echo($text);
    }
	
	public function exportPendaftaran(){
		$this->load->model('ModelPendaftaran');
        $data = $this->ModelPendaftaran->queryAllData();
		
		// output headers so that the file is downloaded rather than displayed
		header('Content-type: text/csv');
		header('Content-Disposition: attachment; filename="DATA_PENDAFTARAN.csv"');
		 
		// do not cache the file
		header('Pragma: no-cache');
		header('Expires: 0');
		 
		// create a file pointer connected to the output stream
		$file = fopen('php://output', 'w');
		 
		// send the column headers
		fputcsv($file, array('No.','NRP','Nama','JK','Jurusan','Line', 'Alergi'));
		 
		//DATA
		$temp = array();
		$index = 1;
        foreach($data as $i){
			$text[] = array($index, $i->NRP, $i->NAMA, $i->jk, $i->JURUSAN, $i->LINE, $i->alergi);
            $index++;
        }
		 
		// output each row of the data
		foreach ($text as $row)
		{
			fputcsv($file, $row);
		}
		exit();
	}

    //PELUNASAN
    public function querySudahLunas(){
        $this->load->model('ModelPelunasan');
        $data = $this->ModelPelunasan->queryLunasModal();
        echo json_encode($data);
    }

    public function queryBelumLunas(){
        $this->load->model('ModelPelunasan');
        $data = $this->ModelPelunasan->queryNonLunasModal();
        echo json_encode($data);
    }

    public function insertPelunasan(){
        $this->load->model('ModelPelunasan');
        $nrp = $this->input->post("nrp-insert");
        $data = $this->ModelPelunasan->getEmail($nrp);
        $email = null;
        foreach ($data as $i){
            $email = $i->email;
        }

        $date = date('d-m-Y, h:i:s A');
        $data = $this->ModelPelunasan->cekRegister($nrp);
        $count = null;
        //GET NRP FROM QUERY
        foreach ($data->result() as $i){
            $count = $i->jumlah;
        }
        if($count == 0){
            echo "BELUM MELAKUKAN PENDAFTARAN !!!";
        }else{
            $this->ModelPelunasan->insertPelunasanModel($nrp);
            $this->email($nrp, $date, $email);
            echo $nrp." BERHASIL PELUNASAN !!!";
        }
    }

    public function email($nrp, $date, $email){
        include_once("PHPMailer/phpmailer.php");
        //SEND EMAIL
        $emails=new myPHPMailer();
        $emails->send_news($nrp,$date, $email);
    }

    public function deletePelunasan(){
        $this->load->model('ModelPelunasan');
        $nrp = $this->input->post("nrp");

        $data = $this->ModelPelunasan->getPelunasan($nrp);

        //GET NRP FROM QUERY
        foreach ($data as $i){
            $statusLunas = $i->jumlah;
        }
        if($statusLunas == 0){
            echo "DATA BELUM MELAKUKAN PELUNASAN !!!";
        }else{
            $this->ModelPelunasan->deletePelunasanModel($nrp);
            echo $nrp." BERHASIL DIHAPUS PELUNASAN !!!";
        }
    }

    //LOGIN LOGOUT
    public function logout(){
        $this->session->unset_userdata('email');
        redirect();
    }
}
