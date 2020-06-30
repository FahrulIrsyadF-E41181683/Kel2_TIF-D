<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
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
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('desk_kategori');

        $data['tb'] = $this->kategori_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('desk_kategori', 'Deskripsi Kategori', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/tambah_kategori_v", $data);
        } else {
            $id = $this->kategori_m->getIdKategori();
            $data = [
                'ID_KTR' => $id,
                'KATEGORI' => $kategori,
                'KETERANGAN' => $deskripsi
            ];
            $this->kategori_m->input_data($data, 'tb_kategori');
            redirect('admin/kategori');
        }
    }

    public function edit($id)
    {
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('desk_kategori');

        $data['kategori'] = $this->kategori_m->getDataById($id);
        $data['tb'] = $this->kategori_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('desk_kategori', 'Deskripsi Kategori', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/tambah_kategori_v", $data);
        } else {
            $data = [
                'KATEGORI' => $kategori,
                'KETERANGAN' => $deskripsi
            ];
            $this->kategori_m->update_data(['ID_KTR' => $id],$data,'tb_kategori');
            redirect('admin/kategori');
        }
    }

    public function hapus($id) 
    {
        $this->kategori_m->hapus_data(['ID_KTR' => $id], 'tb_kategori');
        redirect('admin/kategori');
    }

}
