<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Belajar extends CI_Controller {
	
//FUNGSI UNTUK MEMANGGIL mode 'm_data'

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
	}

	//FUNGSI UNTUK MENGAMBIL DATA DAN MENGARAHKAN KE v_user

	function user(){
		$data['user'] = $this->m_data->ambil_data()->result();
		$this->load->view('v_user.php',$data);
	}
 
}