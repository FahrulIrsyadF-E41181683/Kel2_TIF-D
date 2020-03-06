<?php 

class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
    }
    
    // fungsi untuk menambah data
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    //fungsi untuk menghapus data
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //model edit data user
    function edit_data($where,$table){		
	    return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
	}	

}