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

    public function tambah()
    {
        $this->form_validation->set_rules($this->kategori_m->rules());
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('admin/tambah_kategori');
        }else {
            $this->kategori_m->tambahDataKategori();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/kategori');
        }
    }
}