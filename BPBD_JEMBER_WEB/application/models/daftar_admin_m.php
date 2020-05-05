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
}