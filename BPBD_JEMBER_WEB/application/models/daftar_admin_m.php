<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_admin_m extends CI_Model
{
    public function getAllAdmin()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function countAllAdmin()
    {
        return $this->db->get('tb_')->num_rows();
    }
    // method untuk mengupdate data ke dalam database 
  function update_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
    }	

    function hapus_data($where){
        
      return $this->db->delete("tb_user", array("ID_USR"=>$where));}
  
      public function tambahDataDaftarAdmin(){
            
        // autonumber
      $this->db->select('RIGHT(tb_user.ID_USR,7) as ID_USR', FALSE);
      $this->db->order_by('ID_USR','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('tb_user');  //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
        //cek kode jika telah tersedia    
        $data = $query->row();      
        $kode = intval($data->ID_USR + 1); 
      }
      else{      
        $kode = 1;  //cek jika kode belum terdapat pada table
      } 
        $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);    
              $kodetampil = "USR".$batas;  //format kode
        
        $data = [
            "ID_USR" => $kodetampil,
            "NAMA" => $this->input->post('NAMA', true),
            "ALAMAT" => $this->input->post('ALAMAT', true),
            "NOMER" => $this->input->post('NOMER', true),
            "EMAIL" => $this->input->post('EMAIL', true),
            "FOTO" => $this->input->post('FOTO', true)
        ];
  
        $this->db->insert('tb_user', $data);
      }
  
      public function rules()
      {
          return [
              ['field' => 'NAMA',
              'label' => 'NAMA',
              'rules' => 'required'],
  
              ['field' => 'ALAMAT',
              'label' => 'ALAMAT',
              'rules' => 'required'],

              ['field' => 'NOMER',
              'label' => 'NOMER',
              'rules' => 'required'],

              ['field' => 'EMAIL',
              'label' => 'EMAIL',
              'rules' => 'required'],

              ['field' => 'FOTO',
              'label' => 'FOTO',
              'rules' => 'required']
             ];
      }
  
}