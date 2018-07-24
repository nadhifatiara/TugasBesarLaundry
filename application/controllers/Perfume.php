<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfume extends CI_Controller {

	//konstruktor (statement yang selalu dipanggil pada setiap function)
	function __construct() {
		parent::__construct();
		//load model Perfume_m
		$this->load->model('Perfume_m');
		//load helper form
		$this->load->helper('form');	
	}

	/* index (fungsi yang akan berjalan jika tidak ada fungsi yang dipangggil)
	jika url = ".[]/perfume" maka fungsi index yang dijalankan */
	public function index()
	{
		/* mengisi $data['getData'] berupa data yang 
		terlah direturn pada fungsi getData() pada Perfume_m */
		$data['getData'] = $this->Perfume_m->getData();
		// memanggil view 'perfume/perfume.php' dan diberi variable $data
		$this->load->view('admin/perfume/perfume.php',$data);
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
		$this->form_validation->set_rules('perfume_name','Name','required');
		$this->form_validation->set_rules('perfume_costperkilo','Cost Per Kilo','required');
	

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'perfume/tambah.php'
			$this->load->view('admin/perfume/tambah.php'); 
		}
		// jika kita sudah melalukan submit
		else{
			$config['upload_path'] = './assets/upload/perfume/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image')){
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/perfume/tambah.php',$data); 
			}
			else{
				//memanggil fungsi insertData pada model
				$this->Perfume_m->insertData();
				//redirect / pergi ke halaman 'perfume'
				redirect('perfume');
			}
		}
	}

	/*$id adalah parameter
	contoh penggunakan perfume/ubah/1 
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
		$this->form_validation->set_rules('perfume_name','Name','required');
		$this->form_validation->set_rules('perfume_costperkilo','Cost Per Kilo','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['getData'] = $this->Perfume_m->getDataWhereId($id)[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'perfume/ubah.php'
			$this->load->view('admin/perfume/ubah',$data);
		}
		// jika kita sudah melalukan submit
		else{
			//memanggil fungsi insertData pada model
			$this->Perfume_m->updateData($id);
			//redirect / pergi ke halaman 'perfume'
			redirect('perfume');
		}
	}

	/*$id adalah parameter
	contoh penggunakan perfume/hapus/1 
	*/ 
	public function hapus($id)
	{
		//memanggil fungsi hapusData pada model
		$this->Perfume_m->hapusData($id);
		redirect('perfume');
	}
}
