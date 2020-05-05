<?php

// config untuk pagination
$config['base_url'] = 'http://localhost/Kel2_TIF-D/BPBD_JEMBER_WEB/admin/berita/index'; //mengatur halaman default dari halaman berita

// tampilan pagination
$config['full_tag_open']= '<nav"><ul class="pagination justify-content-center">'; // pembuka atau pembungkus dari li
$config['full_tag_close']= '</ul></nav>'; //penutup dari pembuka

$config['first_link'] = 'Pertama'; //untuk mengatur first dari pagination
$config['first_tag_open'] = '<li class="page-item">';
$config['firs_tag_close'] = '</li>';

$config['last_link'] = 'Terakhir'; //untuk mengatur last dari pagination
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '&gt;'; //untuk mengatur tanda next/selanjutnya dari pagination
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';


$config['prev_link'] = '&lt;'; //untuk mengatur tanda prev/sebelumnya dari pagination
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">'; //untuk mengatur tampilan saat artibut li sedang activ/dibuka
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">'; //untuk mengatur jumlah tampilan daftar halaman atau pagination
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => 'page-link'); // untuk menambahkan artibut class pada link/a agar memiliki tampilan