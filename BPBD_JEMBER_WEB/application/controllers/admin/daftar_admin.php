<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('daftar_admin_m');
    }

    public function index()
    {
        $data['tb_user'] = $this->daftar_admin_m->getAllAdmin();
        // memanggil halaman view
        $this->load->view("admin/daftar_admin_v", $data);
    }
}
