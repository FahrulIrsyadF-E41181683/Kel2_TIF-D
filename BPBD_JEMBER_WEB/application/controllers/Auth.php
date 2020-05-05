<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_id');
        $this->load->model('m_login');
    }
    public function index()
    {
        // Peraturan
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);
        // Jika gagal maka dikembalikan ke halaman login
        if ($this->form_validation->run() == false) {
            // Judul Halaman
            $data['title'] = 'Login Akun';
            $this->load->view("includes/head.php");
            $this->load->view("includes/navbar2.php");
            $this->load->view('auth/login');
            $this->load->view("includes/footer.php");
            $this->load->view("includes/js.php");
        } else {
            // Jika validasi sukses maka ->
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username'); // Menangkap data username yang diinputkan di form login
        $password = md5($this->input->post('password')); // Menangkap data password yang diinputkan di form login

        // Kemudian data yang diterima dan ditangkap di jadikan array agar dapat dikembalikan lagi ke model m_login

        // Cek ketersediaan username dan password user dengan fungsi cek login yang ada di model->m_login
        $cek = $this->m_login->cek_login("tb_user", ['USERNAME' => $username])->row_array();
        $user = $this->db->get_where('tb_user', ['USERNAME' => $username])->row_array();
        // Jika hasil cek ternyata menyatakan username dan password tersedia maka dibuat session berisi username dan status login, kemudian akan di arahkan ke view->dashboard.
        if ($user) {
            //jika user aktif
            if ($user['STATUS'] == 1) {
                //cek Password
                if ($password == $user['PASSWORD']) {
                    $data = [
                        'ID_USR' => $user['ID_USR'],
                        'ROLE' => $user['ROLE']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['ROLE'] == 1) {
                        redirect('beranda');
                    } else {
                        redirect('admin/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Akun ini belum di aktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Akun tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function verif()
    {
        $data['user'] = $this->db->get_where('tb_user', ['ID_USR' => $this->session->userdata('id_usr')])->row_array();
        $this->load->view('auth/verif_v.php', $data); //Untuk menampilkan view verif_v dan me-load variabel $data
    }

    public function verifikasi()
    {
        $id = $this->input->post('ID_USR');
        $nik = $this->input->post('NIK');

        //cek jika ada gambar
        $upload_image = $_FILES['FOTO_KTP'];

        if ($upload_image) {
            // Konfigurasi gambar yang akan diupload
            $config['allowed_types'] = 'gif|jpg|png'; //Format file yang dibolehkan
            $config['max_size'] = '2048'; // Ukuran maksimal
            $config['upload_path'] = './assets/img/profile/'; // Tempat yang digunakan untuk menyimpan gambar

            $this->load->library('upload', $config); // load library upload dan aktivasi konfigurasi gambar

            if ($this->upload->do_upload('FOTO_KTP')) { // jika melakukan upload foto ktp
                $FOTO_KTP = $this->upload->data("file_name");
                $this->db->set('FOTO_KTP', $FOTO_KTP); // Maka simpan file yang diupload sesuai dengan nama file tersebut
            } else {
                echo $this->upload->display_errors(); // jika upload gagal maka tampilkan error
            }
        }

        $upload_image2 = $_FILES['FOTO_ORG'];

        if ($upload_image2) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('FOTO_ORG')) {
                $FOTO_ORG = $this->upload->data("file_name");
                $this->db->set('FOTO_ORG', $FOTO_ORG);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('NIK', $nik);
        $this->db->where('ID_USR', $id);
        $this->db->update('tb_user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Akun telah berhasil dibuat! Akun anda akan diverifikasi paling lambat 2 hari.</strong><br/>Silakan Login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>'
        );
        redirect('auth');
    }

    public function registrasi()
    {
        // ID Matters Start
        $this->load->model('m_id');
        $data['id'] = $this->m_id->get_kode();
        // ID Matters End
        // Peraturan Form 
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'required' => 'Username harus diisi!',
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi!'
        ]);
        $this->form_validation->set_rules('nomer', 'Nomer', 'required|trim', [
            'required' => 'Nomer telepon harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Isi email yang valid!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // Jika gagal maka dikembalikan ke halaman registrasi
        if ($this->form_validation->run() == false) {
            // Judul Halaman
            $data['title'] = 'Registrasi Akun';
            $this->load->view("includes/head.php");
            $this->load->view("includes/navbar2.php");
            $this->load->view('auth/registrasi', $data);
            $this->load->view("includes/footer.php");
            $this->load->view("includes/js.php");
        } else {
            $data = [
                // POST ALL              
                'id_usr'    => htmlspecialchars($this->input->post('id_user', true)),
                'nama'      => htmlspecialchars($this->input->post('name', true)),
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'alamat'    => htmlspecialchars($this->input->post('alamat', true)),
                'nomer'     => htmlspecialchars($this->input->post('nomer', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'gambar'    => 'default.jpg',
                'password'  => md5($this->input->post('password1')),
                'role'      => 1,
                'status'    => 0
            ];

            $this->db->insert('tb_user', $data);
            $id = $this->input->post('id_user');
            $data['usr'] = $this->db->query("SELECT * FROM tb_user WHERE ID_USR='$id'")->row_array();
            // $data['usr'] = $this->db->get_where('tb_user', ['ID_USR' => $this->input->post('id_user')])->row_array();
            // $this->session->set_userdata($ver);
            // redirect('auth/verif', $ver);
            $this->load->view('auth/verif_v.php', $data);
        }
    }
}
