<?php 

//FUGSI UNTU MENGAMBIL DATA YANG ADA DI DATABASE TABEL USER

class M_data extends CI_Model{
	function ambil_data(){
		return $this->db->get('user');
	}
}