<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct(){
    parent::__construct();
    // is_logged_in();		
    // $this->load->model('m_user');
    
    //function untuk memanggil helper url melalui controller
                $this->load->helper('url');
	}
    public function index(){
      //untuk mengecek session sesuai dengan email saat login
      $data['tb_user']= $this->db->get_where('tb_user', ['email' =>
      $this->session->userdata('email')])->row_array();
        // $data['tb_user'] = $this->m_user->tampil_datauser()->result();
      // memparsing ke dalam v_profile  
            $this->load->view('v_profile', $data);
        }

        //membuat method untuk edit profile
    public function edituser(){
      $this->load->library('form_validation');
      $data['tb_user']= $this->db->get_where('tb_user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('USERNAME', 'Username', 'required|trim');
      $this->form_validation->set_rules('PASSWORD', 'Password', 'required|trim|min_length[8]');
      $this->form_validation->set_rules('NAMA', 'Nama', 'required');
      $this->form_validation->set_rules('ALAMAT', 'Alamat', 'required');
      $this->form_validation->set_rules('NOMER', 'No Hp', 'required');
      $this->form_validation->set_rules('EMAIL', 'Email', 'required');

      if ($this->form_validation->run()== false){

        // memparsing ke dalam v_editprofile  
      $this->load->view('v_editprofile', $data);
      } else{
        $id_user = $this->input->post('ID_USR');
        $username = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        $nama = $this->input->post('NAMA');
        $alamat = $this->input->post('ALAMAT');
        $no_hp = $this->input->post('NOMER');
        $email = $this->input->post('EMAIL');

        //untuk mengecek gambar yang akan diupload
        $upload_gambar = $_FILES['GAMBAR']['NAMA'];   

        if($upload_gambar){
          $config['allowed_types']= 'jpg|png';
          $config['max_size']= '2048';
          $config['upload_path']= './assets/img/profile/';

          //menjalankan library upload
          $this->load->library('upload', $config);

          if($this->upload->do_upload('GAMBAR')){

            //menampilkan gambar default bagi user yang belum mengganti photo profil
            $old_gambar= $data['tb_user']['GAMBAR'];

            if($old_gambar != 'default.jpg'){

              //menghapus foto lama yang telah di upload
              unlink(FCPATH . 'assets/img/profile/'. $old_gambar);
            }

            $new_gambar= $this->upload->data('file_name');
            $this->db->set('GAMBAR', $new_gambar);
          }else{
             echo $this->upload->display_errors();
          }
        }
        

        $this->db->set('USERNAME', $username );
        $this->db->set('PASSWORD', $password );
        $this->db->set('NAMA', $nama );
        $this->db->set('ALAMAT', $alamat );
        $this->db->set('NOMER', $no_hp );
        $this->db->set('EMAIL', $email );
        $this->db->where('ID_USR', $id_user);
        $this->db->update('tb_user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role= "alert">Your Profile has been updated </div>');
        redirect('profile/index');
      }
      
    }

}