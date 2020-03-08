# REST API + CI 3 

REST (REpresentational State Transfer) merupakan standar arsitektur komunikasi berbasis web yang sering diterapkan dalam pengembangan layanan berbasis web. 

## PERSIAPAN

- CodeIgniter 3.1.11+
- XAMPP
- Visual Studio
- Postman
- Libary Rest API server

## PEMASANGAN

- Download terlebih dahulu aplikas "Postman" kemudian install
- Download Codeigniter dan library REST server yang diperlukan dapat diunduh di https://github.com/ardisaurus/ci-restserver.
- Pindahkan ke folder htdoc pada direktori XAMPP
- Ubah nama sesuai keinginan ex : "master"

## PRAKTEK

Metode GET menampilkan data yang telah disediakan oleh REST API.
Buat file php baru di di master/application/controller dengan nama kontak.php.

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini
}
?>
```
untuk melihat hasilnya buka Postman masukan http://127.0.0.1/master/index.php/kontak pada address lalu send

Metode POST, mengirimkan atau menambahkan data baru dari client ke server REST API.
tambahkan fungsi baru pada kontak.php

```php
 //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
```
kemudian, pilih POST, klik "Body", pilih "x-www-form-urlencoded" kemudian masukan key dan value yang dibutuhkan, lalu klik send, lalu GET untuk melihat data terbaru

METODE PUT, untuk memperbarui data yang telah ada di server REST API.
tambahkan fungsi baru pada kontak.php

```php
//Memperbarui data kontak yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
```
kemudian, pilih PUT, klik "Body", pilih "x-www-form-urlencoded" kemudian masukan key id dan value yang akan dirubah kemudin ganti valuenya, klik send, lalu GET untuk melihat data terbaru

Metode DELET, untuk menghapus data yang sudah ada di server REST API.
tambahkan fungsi baru pada kontak.php

```php
//Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
```
kemudian, pilih DELET, klik "Body", pilih "x-www-form-urlencoded" kemudian masukan key id dan value yang akan dihapus, klik send, lalu GET untuk melihat data terbaru



## KESIMPULAN

REST API dapat digunakan dalam pembuatan aplikasi WEB, Dekstop, atau Android yang menjadi client dari REST API tesebut.
Keseluruhan isi dari kontak.php

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response($kontak, 200);
    }

    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
```