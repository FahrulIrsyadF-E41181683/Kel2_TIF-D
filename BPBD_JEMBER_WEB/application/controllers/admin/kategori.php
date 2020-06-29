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
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        
        $this->form_validation->set_rules($this->kategori_m->rules());
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('admin/tambah_kategori', $data);
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

    // mengedit data kategori 
    public function edit ($ID_KTR)
    { 
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        
        $this->form_validation->set_rules($this->kategori_m->rules());
        if ($this->form_validation->run() == FALSE) {
            // memanggil halaman view admin/berita_tambah
            $this->load->view('admin/ubah_kategori', $data);
        } else {
            $this->kategori_m->ubahDataKategori();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/kategori');
        }
    }

}