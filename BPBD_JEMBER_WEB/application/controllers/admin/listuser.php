<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listuser extends CI_Controller {
    public function __contruct()
    {
        parent::__contruct();

    }

    public function index()
    {
        // memanggil halaman view admin/list_user_v
        $this->load->view("admin/list_user_v");
    }
}