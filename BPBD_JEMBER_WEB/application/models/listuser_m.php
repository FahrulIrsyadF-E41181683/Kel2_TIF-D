<?php
class listuser_m extends CI_Model
{
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
