<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // memanggil model berita_m
        $this->load->model('berita_m', 'berita'); // <- berita digunakan untuk merubah/alias dari berita_m jadi cukup menuliskan berita
    }

    public function index()
    {
        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_kategori"]= $this->berita->getKategori();
        $data["tb_berita"] = $this->berita->getBerita(3, 0);

        // memanggil halaman view beranda_v
        $this->load->view("beranda_v", $data);
    }
}
