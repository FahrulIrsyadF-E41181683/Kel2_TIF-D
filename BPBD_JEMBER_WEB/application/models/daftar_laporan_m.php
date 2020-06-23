<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_laporan_m extends CI_Model
{

    public function getLaporanUnread()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->join('tb_laporan', 'tb_kategori.ID_KTR=tb_laporan.ID_KTR');
        return $this->db->get_where('', ['IS_READ' => 0]);
    }

    // memanggil data yang ada pada tabel tb_berita & join tb_kategori & join tb_user
    public function getAllLaporan()
    {
        $this->db->order_by('ID_LPR', 'ASC');
        return $this->db->from('tb_laporan')
            ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_laporan.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
            ->join('tb_user', 'tb_user.ID_USR=tb_laporan.ID_USR') // <- join tb_laporan agar dapat menampilkan nama
            ->get()
            ->result_array();
    }

    // memanggil data dan membatasi data yang ditampilkan
    public function getLaporan($limit, $start, $cari = null)
    {
        if ($cari) {
            $this->db->like('LOKASI', $cari); // method pencarian berdasarkan judul
        }
        $this->db->order_by('ID_LPR', 'DESC');
        return $this->db->from('tb_laporan')
            ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_laporan.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
            ->join('tb_user', 'tb_user.ID_USR=tb_laporan.ID_USR') // <- join tb_laporan agar dapat menampilkan nama
            ->get('', $limit, $start)
            ->result_array();
    }

    public function getLaporan2($limit, $start, $cari = null)
    {
        if ($cari) {
            $this->db->like('LOKASI', $cari); // method pencarian berdasarkan judul
        }
        $this->db->order_by('ID_LPR', 'DESC');
        return $this->db->from('tb_laporan')
            ->join('tb_kategori', 'tb_kategori.ID_KTR=tb_laporan.ID_KTR') // <- join tb_kategori agar dapat menampilkan nama
            ->get('', $limit, $start)
            ->result_array();
    }

    // menampilkan data yang ada di tabel tb_kategori
    public function getKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }

    // menghitung data yang ada pada tabel berita
    public function countlaporan()
    {
        return $this->db->get('tb_laporan')->num_rows();
    }

    // hapus data berita
    public function hapusDatalaporan($ID_LPR)
    {
        $this->hapusGambar($ID_LPR);
        $this->db->delete('tb_laporan', ['ID_LPR' => $ID_LPR]);
    }

    // hapus gambar
    private function hapusGambar($ID_LPR)
    {
        $berita = $this->getLaporanbyID($ID_LPR);
        if ($berita->GAMBAR != "default.png") {
            $filename = explode(".", $berita->GAMBAR)[0];
            return array_map('unlink', glob(FCPATH . "/assets/img/berita_gambar/$filename.*"));
        }
    }

    // ubah status berita
    public function statusDataLaporan($ID_LPR, $STATUS)
    {
        if ($STATUS == 0) {
            $data = [
                "STATUS" => "1"
            ];
            $this->db->where('ID_LPR', $ID_LPR);
            $this->db->update('tb_laporan', $data);
        } else {
            $data = [
                "STATUS" => "0"
            ];
            $this->db->where('ID_LPR', $ID_LPR);
            $this->db->update('tb_laporan', $data);
        }
    }

    // mendapatkan id berita yang dipilih
    public function getLaporanbyID($ID_LPR)
    {

        return $this->db->get_where('tb_laporan', ['ID_LPR' => $ID_LPR])->row_array();
    }
}
