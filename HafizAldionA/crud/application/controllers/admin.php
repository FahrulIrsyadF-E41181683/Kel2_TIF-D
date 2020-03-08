<?php 
 
class Admin extends CI_Controller{
 
	//FUNGSI UNTUK MENAMPILKAN STATUS BAHWA SUDAH LOGIN
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$this->load->view('v_admin');
	}
}