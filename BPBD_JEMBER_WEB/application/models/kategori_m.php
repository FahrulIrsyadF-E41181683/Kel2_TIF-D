<?php
//  berfungsi untuk melayani segala query CRUD database
class kategori_m extends CI_Model
{

  public function getIdKategori()
  {
    $this->db->select('RIGHT(tb_kategori.ID_KTR,7) as ID_KTR', FALSE);
    $this->db->order_by('ID_KTR', 'DESC');
    $query = $this->db->get('tb_kategori', 1);
    if ($query->num_rows() <> 0) {
      //cek kode jika telah tersedia    
      $data = $query->row();
      $kode = intval($data->ID_KTR) + 1;
    } else {
      $kode = 1;  //cek jika kode belum terdapat pada table
    }
    $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);
    return $kodetampil = "KTR" . $batas;  //format kode
  }

  public function getDataById($id)
  {
    return $this->db->get_where('tb_kategori', ['ID_KTR' => $id])->row_array();
  }

  // function untuk mengambil keseluruhan baris data dari tabel user
  public function tampil_data()
  {
    return $this->db->get('tb_kategori')->result_array();
  }

  public function tampil_data2()
  {
    return $this->db->get('admin');
  }

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function hapus_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }
  // method untuk mengupdate data ke dalam database 
  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
