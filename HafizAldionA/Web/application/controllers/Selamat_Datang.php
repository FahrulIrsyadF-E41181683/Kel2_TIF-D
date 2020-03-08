<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
//FUNGSIN UNTUK MEMANGGIL CONSTRUCT "HTML"

	function __construct(){
		parent::__construct();
		$this->load->helper('html');
	}

//FUNGSI UNTUK MENGARAHKAN KE VIEW 'welcome'

	public function index(){
		$this->load->view('welcome');
	}
}