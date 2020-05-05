<?php 
//  berfungsi untuk melayani segala query CRUD database
class kategori_m extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('tb_kategori')->result_array();
    }
    public function tampil_data2(){
      return $this->db->get('admin');
      }

    function input_data($data,$table){
      $this->db->insert($table,$data);
      }

      function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where,$table){		
      return $this->db->get_where($table,$where);
  }
  // method untuk mengupdate data ke dalam database 
  function update_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}	
}