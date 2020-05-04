<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_m');
        $this->load->helper('url');
        // is_logged_in();
    }
    public function index()
    {

        // $data['admin'] = $this->db->get_where('admin', [
        //     'email' =>
        //     $this->session->userdata('email')
        // ])->row_array();

        $data['tb_admin'] = $this->profil_m->tampil_data(); //Untuk me-load fungsi tampil_data() di modal profil_m
        $this->load->view("admin/includes/head.php");
        $this->load->view("admin/includes/sidebar.php");
        $this->load->view("admin/includes/navbar.php");
        $this->load->view('admin/profil_v', $data);
        $this->load->view("admin/includes/footer.php");
        $this->load->view("admin/includes/js.php");
    }

    // baris kode function update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
    function update()
    {
        // keempat baris kode ini berfungsi untuk merekam data yang dikirim melalui method post
        // Post versi terbaru :D
        $data['tb_admin'] = $this->db->get_where('tb_user', [
            'ID_USR' =>
            $this->session->userdata('ID_USR')
        ])->row_array();

        $id = $this->input->post('ID_USR');
        $nama = $this->input->post('NAMA');
        $email = $this->input->post('EMAIL');
        $nomer = $this->input->post('NOMER');
        $alamat = $this->input->post('ALAMAT');
        //cek jika ada gambar

        $upload_image = $_FILES['GAMBAR'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('GAMBAR')) {
                $old_image = $data['tb_admin']['GAMBAR'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('GAMBAR', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('NAMA', $nama);
        $this->db->set('EMAIL', $email);
        $this->db->set('NOMER', $nomer);
        $this->db->set('ALAMAT', $alamat);
        $this->db->where('ID_USR', $id);
        $this->db->update('tb_user');
        // baris kode yang mengerahkan pengguna ke link base_url()crud/index/
        redirect('admin/profil/index');
    }
    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('tb_user', ['ID_USR' =>

        $this->session->userdata('ID_USR')])->row_array();

        $this->form_validation->set_rules('passwordSkrg', 'PasswordSkrg', 'required|trim');
        $this->form_validation->set_rules('passwordBaru1', 'Password Baru', 'required|trim|min_length[8]|matches[passwordBaru2]');
        $this->form_validation->set_rules('passwordBaru2', 'Pengulangan Password Baru', 'required|trim|min_length[8]|matches[passwordBaru1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $passwordSkrg = $this->input->post('passwordSkrg');
            $passwordBaru = $this->input->post('passwordBaru1');
            if (!password_verify($passwordSkrg, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
                redirect('user/edit_password');
            } else {
                if ($passwordSkrg == $passwordBaru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama!</div>');
                    redirect('user/edit_password');
                } else {
                    //Sudah OKE!

                    $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);

                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Telah Berhasil Diganti</div>');
                    redirect('user/edit_password');
                }
            }
        }
    }
}
