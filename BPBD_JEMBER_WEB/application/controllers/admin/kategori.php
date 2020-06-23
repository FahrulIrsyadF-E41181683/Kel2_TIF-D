<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
        $this->load->model('daftar_laporan_m', 'laporan'); 
    }

    public function index()
    {
        $data['tb'] = $this->kategori_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        // memanggil halaman view admin/dashboard_v
        $this->load->view("admin/kategori_v", $data);
    }
}