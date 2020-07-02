<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function getProfil($id)
    {
        $data = $this->db->get_where('tb_user', array('ID_USR' => $id))->result();
        $response['data'] = $data;
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = "Edit Profil sukses";
        return $response;
    }
    public function updateProfil($data, $where)
    {
        $this->db->where($where);
        $response['data'] = $this->db->update('tb_user', $data);
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = "Profil Berhasil Diperbarui";
        return $response;
    }
    public function uploadFoto($id, $GAMBAR)
    {
        if ($id == '' || empty($GAMBAR)) {
            return $this->empty_response();
        } else {
            $path = $_SERVER['DOCUMENT_ROOT'] . str_replace(
                basename($_SERVER['SCRIPT_NAME']),
                "",
                $_SERVER['SCRIPT_NAME']
            ) . "assets/img/Profile/" . $id . ".jpeg";
            $finalpath = $id . ".jpeg";
            if (file_put_contents($path, base64_decode($GAMBAR))) {
                $where = array(
                    "ID_USER" => $id
                );
                $set = array(
                    "GAMBAR" => $finalpath
                );

                $this->db->where($where);
                $update = $this->db->update("tb_user", $set);
                if ($update) {
                    $response['status'] = 200;
                    $response['error'] = false;
                    $response['message'] = 'Foto berhasil diubah.';
                    return $response;
                } else {
                    $response['status'] = 502;
                    $response['error'] = true;
                    $response['message'] = 'Foto gagal diubah.';
                    return $response;
                }
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['message'] = 'Foto gagal diupload.';
                return $response;
            }
        }
    }
    public function empty_response()
    {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Field tidak boleh kosong';
        return $response;
    }
}
