<?php 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
 
	//FUNGSI UNTUK MENGARAHKAN KE VIEW 'v_tampil'

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
    }
    
    //FUNGSI MENAMBAHKAN DATA
    function tambah(){
		$this->load->view('v_input');
    }
	
	//FUNGSI UNTUK MENGINPUTKAN DATA KE DATABASE

    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    
    //FUNGSI MENGHAPUS DATA
    function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    
    //FUNGSI EDIT DATA (MENGAMBIL DATA YANG DIPILIH)
    function edit($id){
	$where = array('id' => $id);
	$data['user'] = $this->m_data->edit_data($where,'user')->result();
	$this->load->view('v_edit',$data);
    }

	//UPDATE DATA DENGAN DATA YANG TELAH DIGANTI
    function update(){
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'pekerjaan' => $pekerjaan
		);
 
		$where = array(
		'id' => $id
		);
 
		$this->m_data->update_data($where,$data,'user');
		redirect('crud/index');
	
	}

}