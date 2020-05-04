<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $tb_kategori['tb'] = $this->kategori_m->tampil_data();
        // memanggil halaman view admin/dashboard_v
        $this->load->view("admin/kategori_v", $tb_kategori);
    }
}