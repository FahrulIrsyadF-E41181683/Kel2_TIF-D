<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Berita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // memanggil model berita_m
        $this->load->model('berita_m');
    }

    public function index_get()
    {
        $kategori = $this->get('KATEGORI');
        $kat = $this->berita_m->getKategori();
        if ($kategori === null){
            $berita = $this->berita_m->getAllBerita();
        }else{
            $berita = $this->berita_m->getAllBerita($kategori);
        }
        
        if($berita) {
            $this->response([
                'status' => true,
                'berita' => $berita,
                'kategori' => $kat
            ]);
        }
        // $response = array(
        //     'status' => true,
        //     'berita' => $this->berita_m->getAllBerita(),
        //     'totalPages' => $this->berita_m->getCountBerita());
      
        //   $this->output
        //     ->set_status_header(200)
        //     ->set_content_type('application/json', 'utf-8')
        //     ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        //     ->_display();
        //     exit;
    }
}