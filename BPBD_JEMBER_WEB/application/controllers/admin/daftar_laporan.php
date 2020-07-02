<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // memanggil model berita_m
        $this->load->model('daftar_laporan_m', 'daftar_laporan'); // <- berita digunakan untuk merubah/alias dari berita_m jadi cukup menuliskan berita
        $this->load->model('daftar_laporan_m', 'laporan');
        if (!$this->session->userdata('ID_USR')) {
            redirect('Auth');
        }
    }

    function index()
    {
        // ambil data pencarian
        if ($this->input->post('submit')) {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari', $data['cari']);
        } else {
            $data['cari'] = $this->session->userdata('cari');
        }

        //config
        $this->db->like('LOKASI', $data['cari']); // mencari data
        $this->db->from('tb_laporan'); // data yang dicari berdasarkan tabel tb_berita
        $config['total_rows'] = $this->db->count_all_results(); //memanggil method unutk menghitung baris yang dikembalikan
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5; //untuk mengatur jumlah/limit yang akan ditampilkan

        // initialize semua config
        $this->pagination->initialize($config);

        // mulainya halaman
        $data['start'] = $this->uri->segment(4); // <- 4 menandakan posisi url setelah index

        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_laporan"] = $this->daftar_laporan->getLaporan($config['per_page'], $data['start'], $data['cari']);
        $data["tb_laporan2"] = $this->daftar_laporan->getLaporan2($config['per_page'], $data['start'], $data['cari']);
        $data['role'] = $this->session->userdata('ROLE');
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();

        // memanggil halaman view admin/berita_v
        $this->load->view("admin/includes/head", $data);
        $this->load->view("admin/includes/sidebar", $data);
        $this->load->view("admin/includes/navbar", $data);
        $this->load->view("admin/daftar_laporan_v", $data);
    }

    // menghapus data berita
    public function hapus($ID_LPR)
    {
        $this->daftar_laporan->hapusDataLaporan($ID_LPR);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Daftar_laporan');
    }

    // merubah status data berita
    public function status($ID_LPR, $STATUS)
    {
        $this->daftar_laporan->statusDataLaporan($ID_LPR, $STATUS);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/Daftar_laporan');
    }
}
