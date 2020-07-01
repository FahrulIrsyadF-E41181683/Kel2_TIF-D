<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model('LoginM');
    $this->load->model('m_id');
    $this->load->library('auto_id');
  }

  // method index untuk menampilkan semua data login menggunakan method get
  public function index_get(){
    $response = $this->LoginM->all_login();
    $this->response($response);
  }

  public function id_post(){
    $response = $this->LoginM->get_login($this->post('ID_USR'));
    $this->response($response);
  }

  public function login_post(){
    $response = $this->LoginM->auth_login($this->post('USERNAME'),$this->post('PASSWORD'));
    $this->response($response);
  }

  // Untuk menambah regis menggunakan method post
  public function register_post()
    {
      $row_id = $this->LoginM->getID()->num_rows();
      // mengambil 1 baris data terakhir
      $old_id = $this->LoginM->getID()->row();
  
      if($row_id > 0){
        // melakukan auto number dari id terakhir
      $id = $this->auto_id->autonumber($old_id->ID_USR, 3, 7);
      } else {
        // generate id pertama kali jika tidak ada data sama sekali di dalam database
      $id = 'USR0000001';
      }

  
        $response = $this->LoginM->add_login(
            $id,
            $this->input->post('nama'),
            $this->input->post('username'),
            $this->input->post('alamat'),
            $this->input->post('nomer'),
            $this->input->post('email'),
            md5($this->input->post('password'))
        );
        $this->response($response);
    }


  // update data login menggunakan method put
  public function update_put(){
      if($this->put('gambar')){
          $response = $this->LoginM->upload_login(
            $this->put('id_usr'),
            $this->put('gambar')
            );
      } else {
          $response = $this->LoginM->update_login(
            $this->put('id_usr'),
            $this->put('nama'),
            $this->put('username'),
            $this->put('alamat'),
            $this->put('nomer'),
            $this->put('email')
            );
      }
    
    $this->response($response);
  }

  // hapus data login menggunakan method delete
  public function delete_delete(){
    $response = $this->LoginM->delete_login(
        $this->delete('ID_USR')
      );
    $this->response($response);
  }

}

?>
