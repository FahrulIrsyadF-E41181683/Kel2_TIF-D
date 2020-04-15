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
        $data['tb_admin'] = $this->profil_m->tampil_data('tb_admin')->result();
        $this->load->view('admin/profil_v', $data);

    }
    function edit($id){
        // kode yang berfungsi untuk menyimpan id user ke dalam array $where pada index array benama id
        $where = array('id_produk' => $id);
        // kode di bawah ini adalah kode yang mengambil data user berdasarkan id dan disimpan kedalam array $data dengan index bernama user
        $data['tb_admin'] = $this->m_data->edit_data($where,'tb_admin')->result();
        //$data['getKategori'] = $this->db->get('tb_kategori')->result();
        // kode ini memuat vie edit dan membawa data hasil query diatas
        $this->load->view('admin/includes/head.php', $data);
        $this->load->view('admin/includes/sidebar.php', $data);
        $this->load->view('admin/includes/navbar.php', $data);
        $this->load->view('admin/includes/footer.php');
    
    }

    // baris kode function update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
    function update(){
    // keempat baris kode ini berfungsi untuk merekam data yang dikirim melalui method post
        
        $id = $this->input->post('id_produk');
        $nama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $ukuran = $this->input->post('ukuran');
        $nama_kategori = $this->input->post('nama_kategori');
    
        // brikut ini adalah array yang berguna untuk menjadikan variabel diatas menjadi 1 variabel yang nantinya akan disertakan ke dalam query update pada model
        $data = array(
            'nama_produk' => $nama,
            'harga' => $harga,
            'ukuran' => $ukuran,
            'nama_kategori' => $nama_kategori
        );
    
        // kode yang berfungsi menyimpan id user ke dalam array $where pada index array bernama id
        $where = array(
            'id_produk' => $id
        );
    
        // kode untuk melakukan query update dengan menjalankan method update_data() 
        $this->m_data->update_data($where,$data,'tb_produk');
        // baris kode yang mengerahkan pengguna ke link base_url()crud/index/
        redirect('admin/C_produk/index');
    }
    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user', ['email' =>

        $this->session->userdata('email')])->row_array();

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
