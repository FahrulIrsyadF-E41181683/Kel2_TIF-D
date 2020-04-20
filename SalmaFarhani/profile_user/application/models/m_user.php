<?php 
 
class M_user extends CI_Model{
    
    function tampil_datauser(){
        // mengambil data dari database dengan menginputkan nama tabel dan mengembalikan ke pemanggil fungsi dengan return  
              return $this->db->get('user');
          }
         
	}
