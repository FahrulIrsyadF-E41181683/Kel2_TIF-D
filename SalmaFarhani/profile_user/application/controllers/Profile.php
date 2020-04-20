<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct(){
    parent::__construct();
    is_logged_in();		
    $this->load->model('m_user');
    
    //function untuk memanggil helper url melalui controller
                $this->load->helper('url');
	}
    public function index(){
      //untuk mengecek session sesuai dengan email saat login
      $data['user']= $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
        $data['user'] = $this->m_data->tampil_datauser()->result();
      // memparsing ke dalam v_profile  
            $this->load->view('v_profile',$data);
        }

        //membuat method untuk edit profile
    public function edituser(){
      $data['user']= $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');

      if ($this->form_validation->run()== false){

        // memparsing ke dalam v_editprofile  
      $this->load->view('v_editprofile',$data);
      } else{
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');

        //untuk mengecek gambar yang akan diupload
        $upload_gambar = $_FILES['gambar']['username'];

        if($upload_gambar){
          $config['allowed_types']= 'jpg|png';
          $config['max_size']= '2048';
          $config['upload_path']= './assets/img/profile/';

          //menjalankan library upload
          $this->load->library('upload', $config);

          if($this->upload->do_upload('gambar')){

            //menampilkan gambar default bagi user yang belum mengganti photo profil
            $old_gambar= $data['user']['gambar'];

            if($old_gambar != 'default.jpg'){

              //menghapus foto lama yang telah di upload
              unlink(FCPATH. 'assets/img/profile/'.$old_gambar);
            }

            $new_gambar= $this->upload->data('file_name');
            $this->db->set->('gambar', $new_gambar);
          }else{
             echo $this->upload->display_errors();
          }
        }

        $this->db->set('username', $username );
        $this->db->set('password', $password );
        $this->db->set('nama', $nama );
        $this->db->set('alamat', $alamat );
        $this->db->set('no_hp', $no_hp );
        $this->db->set('email', $email );
        $this->db->where('id_user', $id_user);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role= "alert">Your Profile has been updated </div>');
        redirect('profile/index');
      }
      
    }

}