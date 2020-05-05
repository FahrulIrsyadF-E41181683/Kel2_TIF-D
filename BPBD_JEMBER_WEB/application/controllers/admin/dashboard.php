<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // memanggil halaman view admin/dashboard_v
        $this->load->view("admin/dashboard_v");
    }
}
