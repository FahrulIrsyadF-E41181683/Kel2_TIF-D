<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Profil extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user_m');
    }
    public function profil_post(){
        $response = $this->user_m->getProfil($this->post('ID_USR'));
        if ($response['data'] != null) {
            $this->response($response);
        }else{
            $response['status'] = 502;
            $response['error']= true;
            $response['message']= "Edit Profil error";
            $this->response($response); 
        }
    }
    function getprofil_put()
  {
    $username = $this->db->get_where('tb_user', array('ID_USR' => $this->put('ID_USR')))->row()->USERNAME;
    if($this->put('USERNAME') == $username){
      $data = array('USERNAME' => $this->put('USERNAME'),
                  'NAMA' => $this->put('NAMA'),
                  'ALAMAT' => $this->put('ALAMAT'),
                  'NOMER' => $this->put('NOMER'),
                  'EMAIL' => $this->put('EMAIL'));
              }else{
      $data = array('USERNAME' => $this->put('USERNAME'),
                  'NAMA' => $this->put('NAMA'),
                  'ALAMAT' => $this->put('ALAMAT'),
                  'NOMER' => $this->put('NOMER'),
                  'EMAIL' => $this->put('EMAIL'));
                  
    }

    $where = array('ID_USR' => $this->put('ID_USR'));
    $response = $this->user_m->updateProfil($data, $where);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal Memperbarui Profil';
        $this->response($response);
    }
  }
  public function getFoto_put(){
    $response = $this->user_m->uploadFoto(
      $this->put('ID_USR'),
      $this->put('GAMBAR')
    );
    $this->response($response);
  }

}
?>