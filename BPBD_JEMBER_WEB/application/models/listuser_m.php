<?php
class Listuser_m extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get_where('tb_user', ['ROLE' => 1])->result_array();
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
