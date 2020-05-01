<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Listuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('listuser_m');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['pengguna'] = $this->listuser_m->tampil_data();
        // memanggil halaman view admin/list_user_v
        $this->load->view('admin/list_user_v', $data);
    }
}
