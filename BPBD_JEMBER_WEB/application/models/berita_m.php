<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_m extends CI_Model
{
    // memanggil data yang ada pada tabel tb_berita & join tb_kategori & join tb_user
    public function getAllBerita()
    {
        $this->db->order_by('ID_BRT', 'ASC');
        return $this->db->from('tb_berita')
        ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_berita.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
        ->join('tb_user', 'tb_user.ID_USR=tb_berita.ID_USR') // <- join tb_berita agar dapat menampilkan nama
        ->get()
        ->result_array();
    }

    // memanggil data dan membatasi data yang ditampilkan
    public function getBerita($limit, $start, $cari = null)
    {
        if($cari) {
            $this->db->like('JUDUL', $cari); // method pencarian berdasarkan judul
            $this->db->or_like('tb_berita.ID_KTR', $cari); // method pencarian berdasarkan kategori
        }
        $this->db->order_by('ID_BRT', 'DESC');
        return $this->db->from('tb_berita')
        ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_berita.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
        ->join('tb_user', 'tb_user.ID_USR=tb_berita.ID_USR') // <- join tb_berita agar dapat menampilkan nama
        ->get('', $limit, $start)
        ->result_array();
    }

    // memanggil data terbaru
    public function getBeritaBaru($limit, $start, $cari = null)
    {
        if($cari) {
            $this->db->like('JUDUL', $cari); // method pencarian berdasarkan judul
            $this->db->or_like('tb_berita.ID_KTR', $cari); // method pencarian berdasarkan kategori
        }
        $this->db->order_by('ID_BRT', 'DESC');
        return $this->db->from('tb_berita')
        ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_berita.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
        ->join('tb_user', 'tb_user.ID_USR=tb_berita.ID_USR') // <- join tb_berita agar dapat menampilkan nama
        ->like('STATUS_BRT', '1')
        ->get('', $limit, $start)
        ->result_array();
    }

    // menampilkan data yang ada di tabel tb_kategori
    public function getKategori(){
        return $this->db->get('tb_kategori')->result_array();
    }

    // menampilkan data yang ada di tabel user
    public function getUser(){
        return $this->db->get('tb_user')->result_array();
    }

    // menghitung data yang ada pada tabel berita
    public function countberita()
    {
        return $this->db->get('tb_berita')->num_rows();
    }

    // method untuk validasi data
    public function rules()
    {
        return [
            ['field' => 'judul', // <- diambil dari field artibut name
            'label' => 'Judul', // <- membuat alias dari name
            'rules' => 'required'], // <- validasi yang dibutuhkan

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'lokasi',
            'label' => 'Lokasi',
            'rules' => 'required'],

            ['field' => 'isi_berita',
            'label' => 'Isi Berita',
            'rules' => 'required']
        ];
    }

    //tambah data berita
    public function tambahDataBerita(){
        
        // autonumber
        $this->db->select('RIGHT(tb_berita.ID_BRT,7) as ID_BRT', FALSE);
		  $this->db->order_by('ID_BRT','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_berita');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->ID_BRT) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  } 
			  $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);    
              $kodetampil = "BRT".$batas;  //format kode
        
        $data = [
            "ID_BRT" => $kodetampil,
            "JUDUL" => $this->input->post('judul', true),
            "ID_KTR" => $this->input->post('kategori', true),
            "TANGGAL" => $this->input->post('tanggal', true),
            "LOKASI" => $this->input->post('lokasi', true),
            "ISI_BERITA" => $this->input->post('isi_berita', true),
            "GAMBAR_BRT" => $this->uploadGambar('gambar', true),
            "ID_USR" => $this->input->post('user', true),
            "STATUS_BRT" => "1"
        ];

        $this->db->insert('tb_berita', $data);
    }

    // hapus data berita
    public function hapusDataBerita($ID_BRT)
    {
        $this->db->delete('tb_komentar', ['ID_BRT' => $ID_BRT]);
        // $this->hapusGambar($ID_BRT);
        $this->db->delete('tb_berita', ['ID_BRT' => $ID_BRT]);
    }

    // ubah status berita
    public function statusDataBerita($ID_BRT, $STATUS_BRT)
    {
        if($STATUS_BRT == 0){
            $data = [
                "STATUS_BRT" => "1"
            ];
            $this->db->where('ID_BRT', $ID_BRT);
            $this->db->update('tb_berita', $data);
        }else{
            $data = [
                "STATUS_BRT" => "0"
            ];
            $this->db->where('ID_BRT', $ID_BRT);
            $this->db->update('tb_berita', $data);
        }

    }

    // mendapatkan id berita yang dipilih
    public function getBeritabyID($ID_BRT)
    {
        
        return $this->db->get_where('tb_berita', ['ID_BRT' => $ID_BRT])->row_array();
    }

    // ubah/update data berita
    public function ubahDataBerita(){
  
        if (!empty($_FILES["gambar"]["name"])) {
            $data = [
                "GAMBAR_BRT" => $this->uploadGambar('gambar', true),
                "ID_BRT" => $this->input->post('id_brt', true),
                "JUDUL" => $this->input->post('judul', true),
                "ID_KTR" => $this->input->post('kategori', true),
                "TANGGAL" => $this->input->post('tanggal', true),
                "LOKASI" => $this->input->post('lokasi', true),
                "ISI_BERITA" => $this->input->post('isi_berita', true),
                "ID_USR" => $this->input->post('user', true),
                "STATUS_BRT" => "1"
            ];
        } else {
            $data = [
                "GAMBAR_BRT" => $this->input->post('gambar_lama', true),
                "ID_BRT" => $this->input->post('id_brt', true),
                "JUDUL" => $this->input->post('judul', true),
                "ID_KTR" => $this->input->post('kategori', true),
                "TANGGAL" => $this->input->post('tanggal', true),
                "LOKASI" => $this->input->post('lokasi', true),
                "ISI_BERITA" => $this->input->post('isi_berita', true),
                "ID_USR" => $this->input->post('user', true),
                "STATUS_BRT" => "1"
            ];
        }

        $this->db->where('ID_BRT', $this->input->post('id_brt'));
        $this->db->update('tb_berita', $data);
    }

    private function uploadGambar()
    {
        $config['upload_path']          = './assets/img/berita_gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 3024; // 3MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }print_r($this->upload->display_errors());
        return "default.png";
    }

    // hapus gambar
    private function hapusGambar($ID_BRT)
    {
        $berita = $this->getBeritabyID($ID_BRT);
        if($berita->GAMBAR_BRT != "default.png"){
            $filename = explode(".", $berita->GAMBAR_BRT)[0];
            return array_map('unlink', glob(FCPATH."/assets/img/berita_gambar/$filename.*"));
        }
    }

}