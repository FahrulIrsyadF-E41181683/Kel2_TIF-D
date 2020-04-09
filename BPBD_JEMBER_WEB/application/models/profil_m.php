<?php
class model_user extends CI_Model
{
    public function edit_user($id, $nama, $email, $image, $password, $date_created)
    {
        $hasilUser = $this->db->query("UPDATE tb_user SET nama='$nama', email='$email', image='$image', password='$password', date_created='$date_created' WHERE id='$id'");
        return $hasilUser;
    }
    public function getUser()
    {
        $query = "SELECT * FROM tb_user";
        return $this->db->query($query)->result_array();
    }
}