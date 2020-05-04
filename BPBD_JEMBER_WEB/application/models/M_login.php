<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model{	

// Fungsi cek_login berfungsi untuk mengecek ketersediaan id dan password yang ada di variabel $where apakah ada di dalam tabel
	function cek_login($table, $where)
	{		
		return $this->db->get_where($table, $where);
	}	
}