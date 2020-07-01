<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('daftar_admin_m');
        $this->load->model('daftar_laporan_m', 'laporan');
        $this->load->model('kategori_m');
        if (!$this->session->userdata('ID_USR')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['tb_user'] = $this->daftar_admin_m->getAllAdmin();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        // memanggil halaman view
        $this->load->view("admin/daftar_admin_v", $data);
    }

    public function tambah()
    {
        $data['tb'] = $this->kategori_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/tambah_admin", $data);
        } else {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $nomor = $this->input->post('nomor');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = [
                'ID_USR' => $this->daftar_admin_m->getIdUser(),
                'USERNAME' => $username,
                'PASSWORD' => md5($password),
                'NAMA' => $nama,
                'ALAMAT'    => $alamat,
                'NOMER' => $nomor,
                'EMAIL' => $email,
                'STATUS' => 1,
                'ROLE' => 0
            ];
            $uploadgambar = $_FILES['gambar']['name'];
            if ($uploadgambar) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './assets/img/Profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    # code...
                    $img = $this->upload->data('file_name');
                    $this->db->set('GAMBAR', $img);
                } else {
                    redirect('main/daftar');
                }
            } else {
                $data['GAMBAR'] = 'default.png';
            }

            $this->daftar_admin_m->tambah_data('tb_user', $data);

            redirect('admin/daftar_admin');
        }
    }

    public function edit($id)
    {
        $data['admin'] = $this->daftar_admin_m->getAdminById($id);
        $data['tb'] = $this->kategori_m->tampil_data();
        $data['notif'] = $this->laporan->getLaporanUnread()->result_array();
        $data['notifcount'] = $this->laporan->getLaporanUnread()->num_rows();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/edit_admin", $data);
        } else {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $nomor = $this->input->post('nomor');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data1 = [
                'ID_USR' => $this->daftar_admin_m->getIdUser(),
                'USERNAME' => $username,
                'PASSWORD' => md5($password),
                'NAMA' => $nama,
                'ALAMAT'    => $alamat,
                'NOMER' => $nomor,
                'EMAIL' => $email,
                'STATUS' => 1,
                'ROLE' => 0
            ];
            $uploadgambar = $_FILES['gambar']['name'];
            if ($uploadgambar) {
                # code...
                $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
                $config['max_size'] = 3024;
                $config['file_name'] = uniqid();
                $config['overwrite'] = true;
                $config['upload_path'] = './assets/img/Profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    # code...
                    $old_image = $data['admin']['GAMBAR'];
                    if ($old_image != 'default.png') {
                        # code...
                        unlink(FCPATH . 'assets/img/Profile/' . $old_image);
                    }

                    $img = $this->upload->data('file_name');
                    $this->db->set('GAMBAR', $img);
                } else {
                    redirect('main/daftar');
                }
            }

            $this->daftar_admin_m->edit_data('tb_user', $id, $data1);

            redirect('admin/daftar_admin');
        }
    }

    public function hapus($id)
    {
        $this->daftar_admin_m->delete_data($id);
        redirect('admin/daftar_admin');
    }
}
