<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Download extends CI_Controller {
	
//FUNGSI UNTUK MEMANGGIL CONSTRUCT "HELPER"

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}
 
//FUNGSI UNTUK MENGARAHKAN/MEMANGGIL v_download

	public function index(){		
		$this->load->view('v_download');
	}
 
//FUNGSI UNTUK MENAMBAHKAN FILE YANG AKAN DI DOWNLOAD

	public function lakukan_download(){				
		force_download('gambar/Capture.JPG',NULL);
	}	
 
}