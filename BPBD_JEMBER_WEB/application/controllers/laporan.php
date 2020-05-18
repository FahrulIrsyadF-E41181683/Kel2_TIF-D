<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // memanggil model laporan_m
        $this->load->model('laporan_m', 'laporan'); // <- laporan digunakan untuk merubah/alias dari laporan_m jadi cukup menuliskan laporan
    }

    function index()
    {

        $data["tb_kategori"] = $this->laporan->getKategori();

        // validasi data
        $this->form_validation->set_rules($this->laporan->rules());
        if ($this->form_validation->run() == FALSE) {
            // memanggil halaman view admin/laporan_v.php
            $this->load->view('laporan_v', $data);
        } else {
            $id_lpr = $this->laporan->generateId();
            $input = [
                'ID_LPR' => $id_lpr,
                'ID_KTR' => $this->input->post('kategori', TRUE),
                'NAMA' => $this->input->post('nama', TRUE),
                'EMAIL' => $this->input->post('email', TRUE),
                'ALAMAT' => $this->input->post('alamat', TRUE),
                'LOKASI' => $this->input->post('lokasi', TRUE),
                'DESKRIPSI' => $this->input->post('deskripsi', TRUE),
                'TANGGAL' => $this->input->post('tanggal', TRUE),
                'STATUS' => 0
            ];
            // var_dump($_FILES); die;
            $uploadgambar = $_FILES['gambar']['name'];
            if ($uploadgambar) {
                # code...
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = '10000'; // 3MB
                $config['upload_path']          = './assets/img/profile/';
                // $config['file_name']            = uniqid();
                // $config['overwrite']            = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    # code...
                    $img = $this->upload->data('file_name');
                    // var_dump($img); die;
                    $this->db->set('GAMBAR', $img);
                } else {
                    // echo $this->upload->displays_errors();
                    echo 'Upload GAGAL';
                    die;
                }
            }
            $this->laporan->setLaporan($input);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('beranda');
        }
        // memanggil halaman view admin/laporan_v
        // $this->load->view("laporan_v");
    }
}
