<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	//konstruktor (statement yang selalu dipanggil pada setiap function)
	function __construct() {
		parent::__construct();
		//load model Section_m
		$this->load->model('Section_m');
		//load helper form
		$this->load->helper('form');	
	}

	/* index (fungsi yang akan berjalan jika tidak ada fungsi yang dipangggil)
	jika url = ".[]/section" maka fungsi index yang dijalankan */
	public function index()
	{
		/* mengisi $data['getData'] berupa data yang 
		terlah direturn pada fungsi getData() pada Section_m */
		$data['getData'] = $this->Section_m->getData();
		// memanggil view 'section/section.php' dan diberi variable $data
		$this->load->view('admin/section/section.php',$data);
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
		$this->form_validation->set_rules('section_name','Name','required');
		$this->form_validation->set_rules('section_salary','Cost Per Kilo','required');
		

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'section/tambah.php'
			$this->load->view('admin/section/tambah.php'); 
		}
		// jika kita sudah melalukan submit
		else{
			//memanggil fungsi insertData pada model
			$this->Section_m->insertData();
			//redirect / pergi ke halaman 'section'
			redirect('section');
		}
	}

	/*$id adalah parameter
	contoh penggunakan section/ubah/1 
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
		$this->form_validation->set_rules('section_name','Name','required');
		$this->form_validation->set_rules('section_salary','Cost Per Kilo','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['getData'] = $this->Section_m->getDataWhereId($id)[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'section/ubah.php'
			$this->load->view('admin/section/ubah',$data);
		}
		// jika kita sudah melalukan submit
		else{
			//memanggil fungsi insertData pada model
			$this->Section_m->updateData($id);
			//redirect / pergi ke halaman 'section'
			redirect('section');
		}
	}

	/*$id adalah parameter
	contoh penggunakan section/hapus/1 
	*/ 
	public function hapus($id)
	{
		//memanggil fungsi hapusData pada model
		$this->Section_m->hapusData($id);
		redirect('section');
	}
}
