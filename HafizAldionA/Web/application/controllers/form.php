<?php 
 
class Form extends CI_Controller{

//FUNGSI UNTUK MEMANGGIL CONSTRUCT "LIBARY"
 
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
 
//FUNGSI UNTUK MENGARAHKAN KE v_form

	function index(){
		$this->load->view('v_form');
	}
 
//FUNGSI AKSI UNTUK MENGISI NAMA DAN EMAIL DAN MENGECEK VALIDASINYA

	function aksi(){
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');
 
		if($this->form_validation->run() != false){
			echo "Form validation oke";
		}else{
			$this->load->view('v_form');
		}
	}
}