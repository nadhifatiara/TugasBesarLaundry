<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	//konstruktor (statement yang selalu dipanggil pada setiap function)
	function __construct() {
		parent::__construct();
		//load model Level_m
		$this->load->model('Level_m');
		//load helper form
		$this->load->helper('form');	
		if($this->session->userdata("id") == null){
			redirect("Home");
		}
	}

	/* index (fungsi yang akan berjalan jika tidak ada fungsi yang dipangggil)
	jika url = ".[]/level" maka fungsi index yang dijalankan */
	public function index()
	{
		/* mengisi $data['getData'] berupa data yang 
		terlah direturn pada fungsi getData() pada Level_m */
		$data['getData'] = $this->Level_m->getData();
		// memanggil view 'level/level.php' dan diberi variable $data
		$this->load->view('admin/level/level.php',$data);
	}

	public function tambah()
	{
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('name','Name','required');
		

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'level/tambah.php'
			$this->load->view('admin/level/tambah.php'); 
		}
		// jika kita sudah melalukan submit
		else{
			//memanggil fungsi insertData pada model
			$this->Level_m->insertData();
			//redirect / pergi ke halaman 'level'
			redirect('Level');
		}
	}

	/*$id adalah parameter
	contoh penggunakan level/ubah/1 
	*/ 
	public function ubah($id)
	{
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('name','Name','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['getData'] = $this->Level_m->getDataWhereId($id)[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'level/ubah.php'
			$this->load->view('admin/level/ubah',$data);
		}
		// jika kita sudah melalukan submit
		else{
			//memanggil fungsi insertData pada model
			$this->Level_m->updateData($id);
			//redirect / pergi ke halaman 'level'
			redirect('Level');
		}
	}

	/*$id adalah parameter
	contoh penggunakan level/hapus/1 
	*/ 
	public function hapus($id)
	{
		//memanggil fungsi hapusData pada model
		$this->Level_m->hapusData($id);
		redirect('Level');
	}
}
