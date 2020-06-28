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

    // menghapus data kategori
    public function hapus($ID_KTR)
    {
		$this->kategori_m->hapus_data($ID_KTR);
        
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kategori');
    }
}