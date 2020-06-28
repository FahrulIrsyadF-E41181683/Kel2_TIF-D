<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('daftar_admin_m');
        $this->load->model('daftar_laporan_m', 'laporan'); 
    }

    public function index()
    {
        $data['tb_user'] = $this->daftar_admin_m->getAllAdmin();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        // memanggil halaman view
        $this->load->view("admin/daftar_admin_v", $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules($this->daftar_admin_m->rules());
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('admin/tambah_admin');
        }else {
            $this->daftar_admin_m->tambahDataDaftarAdmin();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/index');
        }
    }
     // menghapus data kategori
     public function hapus($ID_USR)
     {
         $this->daftar_admin_m->hapus_data($ID_USR);
         
         $this->session->set_flashdata('flash', 'Dihapus');
         redirect('admin/tambah_admin');
     }
}
