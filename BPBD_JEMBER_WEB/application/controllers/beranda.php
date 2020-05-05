<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // memanggil halaman view beranda_v
        $this->load->view("beranda_v");
    }
}
