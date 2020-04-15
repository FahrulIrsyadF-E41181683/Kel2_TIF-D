<?php
class profil_m extends CI_Model
{
    public function edit_user($id, $nama, $email, $image, $password, $date_created)
    {
        $hasilUser = $this->db->query("UPDATE tb_admin SET nama='$nama', email='$email', image='$image', password='$password', date_created='$date_created' WHERE id='$id'");
        return $hasilUser;
    }
    public function getUser()
    {
        $query = "SELECT * FROM tb_adminr";
        return $this->db->query($query)->result_array();
    }
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
    public function tampil_data($table){
        return $this->db->get($table);
    }
}