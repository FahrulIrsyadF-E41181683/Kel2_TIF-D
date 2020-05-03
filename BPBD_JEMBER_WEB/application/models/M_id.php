<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_id extends CI_Model
{
    public $id_usr;

    public function __construct()
    {
        $this->load->database();
    }

    public function get_kode()
    {
        $id   = "USR";
        $query  = "SELECT MAX(ID_USR) AS id_user FROM tb_user";
        $data   = $this->db->query($query)->row_array();
        $max_kode = $data['id_user'];
        $max_kode2 = (int) substr($max_kode, 3, 7);
        $kodecount = $max_kode2 + 1;
        $id_user   = $id . sprintf('%07s', $kodecount);
        return $id_user;
    }

    public function tampil_data()
    {
        $sql = "SELECT * FROM tb_user";
        $tampil = $this->db->query($sql);
        return $tampil->result_array();
    }
    // public function cekidusr()
    // {
    // $query = $this->db->query("SELECT MAX(ID_USR) AS id_usr FROM tb_user");
    // $hasil = $query->num_rows();
    // $id_usr = "USR000000".$hasil;
    // return $hasil->id_usr;
    // }

    // public function simpan()
    // {
    //     // $this->id_usr = $_POST['id_usr'];
    //     // $this->db->insert('tb_user', $this);
    // }
    // public function get_id()
    // {    
    //     $id         = "USR";
    //     $query      = "SELECT max(id_usr) as id_user FROM tb_user";
    //     $data       = $this->db->query($query)->row_array();
    //     $max_id     = $data['id_user'];
    //     $max_id2    = (int)substr($max_id, 5, 5);
    //     $id_count   = $max_id2 + 1;
    //     $bln        = date("m");
    //     $id_user   = $id.$bln.sprintf('%05s', $id_count);
    //     return $id_user;
    // }  

}
