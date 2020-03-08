<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ngoding extends CI_Controller {
	
//FUNGSI MENAMPILKAN

	function index(){
		$this->load->library('malasngoding');
		$this->malasngoding->nama_saya();
                echo "<br/>";
                $this->malasngoding->nama_kamu("Andi");
	}
 
}