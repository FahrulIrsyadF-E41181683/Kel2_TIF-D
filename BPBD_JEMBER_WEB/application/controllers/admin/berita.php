<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // memanggil model berita_m
        $this->load->model('berita_m', 'berita'); // <- berita digunakan untuk merubah/alias dari berita_m jadi cukup menuliskan berita
        $this->load->model('daftar_laporan_m', 'laporan'); 
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
        $this->db->like('JUDUL', $data['cari']); // mencari data
        $this->db->from('tb_berita'); // data yang dicari berdasarkan tabel tb_berita
        $config['total_rows'] = $this->db->count_all_results(); //memanggil method unutk menghitung baris yang dikembalikan
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5; //untuk mengatur jumlah/limit yang akan ditampilkan

        // initialize semua config 
        $this->pagination->initialize($config);

        // mulainya halaman
        $data['start'] = $this->uri->segment(4); // <- 4 menandakan posisi url setelah index

        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_berita"] = $this->berita->getBerita($config['per_page'], $data['start'], $data['cari']);

        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();

        // memanggil halaman view admin/berita_v
        $this->load->view("admin/berita_v", $data);
    }

    // menambahkan data berita
    public function tambah()
    {
        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_kategori"] = $this->berita->getKategori();

        // validasi data
        $this->form_validation->set_rules($this->berita->rules());
        if ($this->form_validation->run() == FALSE) {
            // memanggil halaman view admin/berita_tambah
            $this->load->view('admin/tambah_berita', $data);
        } else {
            $this->berita->tambahDataBerita();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/berita');
        }
    }

    // menghapus data berita
    public function hapus($ID_BRT)
    {
        $this->berita->hapusDataBerita($ID_BRT);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/berita');
    }

    // ubah data berita
    public function ubah($ID_BRT)
    {
        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_kategori"] = $this->berita->getKategori();
        $data["tb_berita"] = $this->berita->getBeritabyID($ID_BRT);

        // validasi data
        $this->form_validation->set_rules($this->berita->rules());
        if ($this->form_validation->run() == FALSE) {
            // memanggil halaman view admin/berita_tambah
            $this->load->view('admin/ubah_berita', $data);
        } else {
            $this->berita->ubahDataBerita();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/berita');
        }
    }

    // merubah status data berita
    public function status($ID_BRT, $STATUS_BRT)
    {
        $this->berita->statusDataBerita($ID_BRT, $STATUS_BRT);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/berita');
    }
}
