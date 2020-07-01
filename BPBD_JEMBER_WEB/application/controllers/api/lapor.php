<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Lapor extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->library('auto_id');
        $this->load->model('kategori_m');
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
        $data = array(
            'id_surat'           => $this->post('id_surat'),
            'nip'          => $this->post('nip'),
            'id_jenis_surat'    => $this->post('id_jenis_surat'),
            'nim'          => $this->post('nim'),
            'nama_mitra'          => $this->post('nama_mitra'),
            'alamat_mitra'          => $this->post('alamat_mitra'),
            'tanggal'          => $this->post('tanggal'),
            'tanggal_pengajuan'          => $this->post('tanggal_pengajuan'),
            'status_surat'          => $this->post('status_surat'),
            'keterangan'          => $this->post('keterangan')
        );
        $insert = $this->db->insert('surat', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
