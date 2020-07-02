<?php
class Profil_m extends CI_Model
{
    public function edit_user($id, $nama, $email, $image, $password, $date_created)
    {
        $hasilUser = $this->db->query("UPDATE tb_admin SET NAMA='$nama', EMAIL='$email', GAMBAR='$image', PASSWORD='$password' WHERE id='$id'");
        return $hasilUser;
    }
    public function getUser()
    {
        $query = "SELECT * FROM tb_user";
        return $this->db->query($query)->result_array();
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function tampil_data()
    {
        $sql = "SELECT * FROM tb_user";
        $tampil = $this->db->query($sql);
        return $tampil->result_array();
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
