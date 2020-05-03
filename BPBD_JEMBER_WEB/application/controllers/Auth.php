<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_id');
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
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
        // Jika usernya ada, maka ->
        if ($user) {
            // Jika usernya aktif ->
            if ($user['STATUS'] == 1) {
                // Cek Password, bener atau nggak ->
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Password salah!</strong> Silakan cek ulang!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Akun ini belum diaktifkan</strong> Silakan cek email!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Akun ini tidak terdaftar!</strong> Silakan Daftar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
            );
            redirect('auth');
        }
    }

    public function verif()
    {
        $data['tb_admin'] = $this->m_id->tampil_data();
        $this->load->view('auth/verif_v.php', $data);
    }

    public function verifikasi()
    {
        $data['tb_admin'] = $this->db->get_where('tb_user', [
            'ID_USR' =>
            $this->session->userdata('ID_USR')
        ])->row_array();
        $id = $this->input->post('ID_USR');
        $nik = $this->input->post('NIK');

        //cek jika ada gambar

        $upload_image = $_FILES['FOTO_KTP'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('FOTO_KTP')) {
                $FOTO_KTP = $this->upload->data("file_name");
                $this->db->set('FOTO_KTP', $FOTO_KTP);
            } else {
                echo $this->upload->display_errors();
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

        redirect('auth');
    }

    public function registrasi()
    {
        // ID Matters Start
        $this->load->model('m_id');
        $data['id'] = $this->m_id->get_kode();
        // $dariDB = $this->m_id->cekidusr();
        // contoh USR00004, angka 3 adalah awal pengambilan angka, dan 7 jumlah angka yang diambil
        // $nourut = substr($dariDB, 3, 7);
        // $idusrsekarang = $nourut + 1;
        // $data = array('id_usr' => $idusrsekarang);
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
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
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
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role'      => 1,
                'status'    => 0
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Akun telah berhasil dibuat! </strong> Silakan Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
            );
            redirect('auth/verif');
        }
    }
}
