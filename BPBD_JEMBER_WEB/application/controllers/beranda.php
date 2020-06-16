<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // memanggil model berita_m
        $this->load->model('berita_m', 'berita'); // <- berita digunakan untuk merubah/alias dari berita_m jadi cukup menuliskan berita
    }

    public function index()
    {
        // ambil data pencarian
        if($this->input->get('cari') == ''){
            $this->session->set_userdata('cari', '');
        }else{
            $data['cari'] = $this->session->userdata('cari');
        }
        //config
        $config['base_url'] = 'http://localhost/Kel2_TIF-D/BPBD_JEMBER_WEB/beranda/index/';
        $config['total_rows'] = $this->berita->countberita(); //memanggil method unutk menghitung baris yang dikembalikan
        $config['per_page'] = 5; //untuk mengatur jumlah/limit yang akan ditampilkan

        // styling
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li><span>';
        $config['prev_tag_close'] = '</span></li>';
        
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open'] = '<li class="p-1">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-links');

        //initialize
        $this->pagination->initialize($config);

        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_kategori"]= $this->berita->getKategori();
        $data["tb_berita_baru"] = $this->berita->getBeritaBaru(3, 0);
        $data['start'] = $this->uri->segment(3);
        $data["tb_berita"] = $this->berita->getBeritaBaru($config['per_page'], $data['start']);

        // memanggil halaman view beranda_v
        $this->load->view("beranda_v", $data);
    }

    public function daftar()
    {
        if(!empty($_GET['cari'])){
            $this->session->set_userdata('cari', $_GET['cari']);
            $data['cari'] = $_GET['cari'];
        }else{
            $data['cari'] = $this->session->userdata('cari');
        }

        //config
        $config['base_url'] = 'http://localhost/Kel2_TIF-D/BPBD_JEMBER_WEB/beranda/daftar';
        $this->db->like('JUDUL', $data['cari']);
        $this->db->or_like('ID_KTR', $data['cari']);
        $this->db->from('tb_berita');
        $config['total_rows'] = $this->db->count_all_results(); //memanggil method unutk menghitung baris yang dikembalikan
        $config['per_page'] = 5; //untuk mengatur jumlah/limit yang akan ditampilkan

        // styling
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'Pertama';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li><span>';
        $config['prev_tag_close'] = '</span></li>';
        
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open'] = '<li class="p-1">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-links');

        //initialize
        $this->pagination->initialize($config);

        // method mengambil data dari model berita_m dan memanggil method getBerita
        $data["tb_kategori"]= $this->berita->getKategori();
        $data["tb_berita_baru"] = $this->berita->getBeritaBaru(3, 0);
        $data['start'] = $this->uri->segment(3);
        $data["tb_berita"] = $this->berita->getBeritaBaru($config['per_page'], $data['start'], $data['cari']);
        
        // memanggil halaman view
        $this->load->view("daftar_berita", $data);
    }

    public function baca($ID_BRT)
    {
        $data["tb_kategori"]= $this->berita->getKategori();
        $data["tb_berita_baru"] = $this->berita->getBeritaBaru(3, 0);
        $data["tb_user"] = $this->berita->getUser();
        $data["tb_berita"]= $this->berita->getBeritabyID($ID_BRT);

        // memanggil halaman view
        $this->load->view("baca_berita", $data);

    }

}
