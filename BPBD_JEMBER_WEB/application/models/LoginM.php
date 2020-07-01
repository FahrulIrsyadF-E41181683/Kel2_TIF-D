<?php

// extends class Model
class LoginM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  public function getID()
    {
        return $this->db->query("SELECT * FROM tb_user ORDER BY ID_USR DESC LIMIT 1");
    }

  // function untuk insert data ke tabel tb_user
  public function add_login($id, $nama, $username, $alamat, $nomer, $email, $password){

    if(empty($nama) || empty($username) || empty($alamat) || empty($nomer) || empty($email) || empty($password)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_usr"=>$id,
        "nama"=>$nama,
        "username"=>$username,
        "alamat"=>$alamat,
        "nomer"=>$nomer,
        "email"=>$email,
        "password"=>$password
      );

      $this->db->where('username',$username);
      $check = $this->db->get('tb_user');
      if ($check->num_rows() < 1){
          $insert = $this->db->insert("tb_user", $data);
          if($insert){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data login berhasil ditambahkan.';
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data login gagal ditambahkan.';
          }
      } else {
          $response['status']=502;
          $response['error']=true;
          $response['message']='Email sudah didaftarkan!.';
      }
      return $response;
    }
  }

  // mengambil semua data login
  public function all_login(){

    $all = $this->db->get("tb_user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['login']=$all;
    return $response;

  }

  // mengambil data login tertentu
  public function get_login($id){
    $this->db->where('id_usr',$id);
    $login = $this->db->get('tb_user');
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login->result();
    $response['message']='success';
    return $response;

  }

  public function auth_login($username, $password){
    $login = $this->db->get_where('tb_user',array('USERNAME'=>$username));
    if ($login->num_rows() > 0) {
        if(md5($password)==$login->row()->PASSWORD){
            $response['status']=200;
            $response['error']=false;
            $response['data']=$login->result();
            $response['message']='success';   
        } else {
            $response['status']=502;
            $response['error']=true;
            $response['data']=null;
            $response['message']='Username atau password salah';
        }
    } else {
      $response['status']=500;
      $response['error']=true;
      $response['data']=null;
      $response['message']='Password salah';
    }
    return $response;
  }

  // hapus data login
  public function delete_login($id){

    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_usr"=>$id
      );

      $this->db->where($where);
      $delete = $this->db->delete("tb_user");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data login berhasil dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data login gagal dihapus.';
        return $response;
      }
    }

  }

  // update login
  public function update_login($id,$nama,$username,$alamat,$nomer,$email){

    if($id == '' || empty($nama) || empty($username) || empty($alamat) || empty($nomer) || empty($email)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_usr"=>$id
      );

      $set = array(
        "nama"=>$nama,
        "username"=>$username,
        "alamat"=>$alamat,
        "nomer"=>$nomer,
        "email"=>$email
      );

      $this->db->where($where);
      $update = $this->db->update("tb_user",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data login diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data login gagal diubah.';
        return $response;
      }
    }

  }
  
  public function upload_login($id, $foto){
      if($id == '' || empty($foto)){
          return $this->empty_response();
      } else {
            
            $path = $_SERVER['DOCUMENT_ROOT'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",
						$_SERVER['SCRIPT_NAME'])."foto/".$id.".jpeg";
            $finalpath = base_url()."foto/".$id.".jpeg";
            
            if(file_put_contents($path, base64_decode($foto))){
                $where = array(
                    "id_usr"=>$id
                );
                $set = array(
                    "gambar"=>$finalpath
                );
                
                $this->db->where($where);
                $update = $this->db->update("tb_user",$set);
                if($update){
                    $response['status']=200;
                    $response['error']=false;
                    $response['message']='Foto berhasil diubah.';
                    return $response;
                }else{
                    $response['status']=502;
                    $response['error']=true;
                    $response['message']='Foto gagal diubah.';
                    return $response;
                }  
            } else {
                $response['status']=502;
                $response['error']=true;
                $response['message']='Foto gagal diupload.';
                return $response;
            }
      }
  }

}

?>