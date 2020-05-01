<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __contruct()
    {
        parent::__contruct();
    }

    public function index()
    {
        // memanggil halaman view beranda_v
        $this->load->view("beranda_v");
    }
}
