<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Lapor extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->library('Auto_id');
        $this->load->model('kategori_m');
        $this->load->model('laporan_m');
        $this->load->database();
    }

    //Menampilkan data kategori
    function getKategori_get()
    { {
            $response = $this->kategori_m->getAllKategori();
            if ($response['data'] != null) {
                $this->response($response);
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['message'] = 'Data kategori tidak ditemukan!';
                $this->response($response);
            }
        }
    }

    //Masukan function selanjutnya disini
    function index_post()
    {
        $row_id = $this->laporan_m->getID()->num_rows();
        // mengambil 1 baris data terakhir
        $old_id = $this->laporan_m->getID()->row();

        if ($row_id > 0) {
            // melakukan auto number dari id terakhir
            $id = $this->auto_id->autonumber($old_id->ID_LPR, 3, 7);
        } else {
            // generate id pertama kali jika tidak ada data sama sekali di dalam database
            $id = 'LPR0000001';
        }


        $nama = $this->post('GAMBAR');
        $rand = rand(0, 10000000);
        $path = $_SERVER['DOCUMENT_ROOT'] . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']) . "assets/img/gambar_laporan/" . $rand . '.jpeg';
        file_put_contents($path, base64_decode($nama));
        $data = array(
            'ID_LPR'           => $id,
            'NAMA_PELAPOR'          => $this->post('NAMA_PELAPOR'),
            'ALAMAT'    => $this->post('ALAMAT'),
            'EMAIL'          => $this->post('EMAIL'),
            'LOKASI'          => $this->post('LOKASI'),
            'ID_KTR'        => $this->post('KATEGORI'),
            'DESKRIPSI'          => $this->post('DESKRIPSI'),
            'GAMBAR'          => $rand . '.jpeg'
        );

        $insert = $this->db->insert('tb_laporan', $data);
        if ($insert) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'success';
        } else {
            $response['status'] = 502;
            $response['error'] = true;
            $response['message'] = 'Data gagal diupload';
            return $response;
        }
        $this->response($response);
    }
}
