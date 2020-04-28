<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    public function __contruct()
    {
        parent::__contruct();

    }

    public function index()
    {
        // memanggil halaman view admin/berita_v
        $this->load->view("admin/berita_v");
    }
}