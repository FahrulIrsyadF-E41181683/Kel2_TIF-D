<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama', // <- diambil dari field artibut name
                'label' => 'Nama', // <- membuat alias dari name
                'rules' => 'required' // <- validasi yang dibutuhkan
            ],

            [
                'field' => 'email', // <- diambil dari field artibut name
                'label' => 'Email', // <- membuat alias dari name
                'rules' => 'required' // <- validasi yang dibutuhkan
            ],

            [
                'field' => 'alamat', // <- diambil dari field artibut name
                'label' => 'Alamat', // <- membuat alias dari name
                'rules' => 'required' // <- validasi yang dibutuhkan
            ],

            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],

            [
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'required'
            ],

            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ]
        ];
    }

    public function generateId()
    {
        // autonumber
        $this->db->select('RIGHT(tb_laporan.ID_LPR,7) as ID_LPR', FALSE);
        $this->db->order_by('ID_LPR', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_laporan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->ID_LPR) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);
        return $kodetampil = "LPR" . $batas;  //format kode
    }

    public function setLaporan($data)
    {
        $this->db->insert('tb_laporan', $data);
    }


    private function uploadGambar()
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 3024; // 3MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->upload->initialize($config); // load library upload dan aktivasi konfigurasi gambar

        if ($this->upload->do_upload('GAMBAR')) { // jika melakukan upload foto 
            $gambar = $this->upload->data("file_name");
            $this->db->set('GAMBAR', $gambar); // Maka simpan file yang diupload sesuai dengan nama file tersebut
        } else {
            echo $this->upload->display_errors(); // jika upload gagal maka tampilkan error
        }
    }
}
