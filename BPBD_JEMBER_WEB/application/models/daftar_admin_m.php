<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_admin_m extends CI_Model
{
    public function getAllAdmin()
    {
        return $this->db->get_where('tb_user',['ROLE' => 0])->result_array();
    }

    public function getAdminById($id)
    {
        return $this->db->get_where('tb_user', ['ID_USR' => $id])->row_array();
    }

    public function countAllAdmin()
    {
        return $this->db->get('tb_')->num_rows();
    }

    public function getIdUser()
    {
        $this->db->select('RIGHT(tb_user.ID_USR,7) as ID_USR', FALSE);
        $this->db->order_by('ID_USR', 'DESC');
        $query = $this->db->get('tb_user', 1);
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->ID_USR) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);
        return $kodetampil = "USR" . $batas;  //format kode
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($table, $where, $data)
    {
        $this->db->where('ID_USR', $where);
        $this->db->update($table, $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_user', ['ID_USR' => $id]);
    }
}
