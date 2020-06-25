<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('daftar_laporan_m', 'laporan');
    }

    public function index()
    {
        // memanggil halaman view admin/dashboard_v
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        // var_dump($data['notif']); die;
        $this->load->view("admin/dashboard_v", $data);
    }

    public function readNotif()
    {
        $id_laporan = $this->input->post('id_laporan');
        $this->db->where('ID_LPR', $id_laporan);
        $this->db->update('tb_laporan',['IS_READ' => 1]);
        echo $id_laporan;
    }
}
