<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Listuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('listuser_m');
        $this->load->helper('url');
        $this->load->model('daftar_laporan_m', 'laporan');
        if (!$this->session->userdata('ID_USR')) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['pengguna'] = $this->listuser_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        $data['role'] = $this->session->userdata('ROLE');
        // memanggil halaman view admin/list_user_v
        $this->load->view("admin/includes/head", $data);
        $this->load->view("admin/includes/sidebar", $data);
        $this->load->view("admin/includes/navbar", $data);
        $this->load->view('admin/list_user_v', $data);
    }
}
