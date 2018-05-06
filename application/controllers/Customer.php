<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	//konstruktor (statement yang selalu dipanggil pada setiap function)
	function __construct() {
		parent::__construct();
		//load model Customer_m
		$this->load->model('Customer_m');
		//load helper form
		$this->load->helper('form');	
	}

	/* index (fungsi yang akan berjalan jika tidak ada fungsi yang dipangggil)
	jika url = ".[]/customer" maka fungsi index yang dijalankan */
	public function index()
	{
		/* mengisi $data['getData'] berupa data yang 
		terlah direturn pada fungsi getData() pada Customer_m */
		$data['getData'] = $this->Customer_m->getData();
		// memanggil view 'customer/customer.php' dan diberi variable $data
		$this->load->view('admin/customer/customer.php',$data);
	}

	public function tambah()
	{
		$data['message'] = "";
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('customer_firstname','First Name','required');
		$this->form_validation->set_rules('customer_lastname','Last Name','required');
		$this->form_validation->set_rules('customer_address','Address','required');
		$this->form_validation->set_rules('customer_telp','Telp','required');
		$this->form_validation->set_rules('customer_email','Email','required');
		$this->form_validation->set_rules('customer_password','Password','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'customer/tambah.php'
			$this->load->view('admin/customer/tambah.php',$data); 
		}
		// jika kita sudah melalukan submit
		else{
			$upload = $this->Customer_m->upload();
			if($upload['result'] == "success"){ // Jika proses upload sukses
				//memanggil fungsi insertData pada model
				$this->Customer_m->insertData($upload['file']['file_name']);
				//redirect / pergi ke halaman 'customer'
				redirect('customer');
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
				$this->load->view('admin/customer/tambah.php',$data); 
			}
		}
	}

	/*$id adalah parameter
	contoh penggunakan customer/ubah/1 
	*/ 
	public function ubah($id)
	{
		$data['message'] = "";
		//load library form_validation
		$this->load->library("form_validation");
		/* aturan form validation 
		- parameter 1 ('id') = ditujukan pada input yang name="id"
		- parameter 2 ('ID') = untuk tampilan error
		- parameter 3 ('required') = rule nya (ada banyak rule buka di userguide)
		*/
		$this->form_validation->set_rules('customer_firstname','First Name','required');
		$this->form_validation->set_rules('customer_lastname','Last Name','required');
		$this->form_validation->set_rules('customer_address','Address','required');
		$this->form_validation->set_rules('customer_telp','Telp','required');
		$this->form_validation->set_rules('customer_email','Email','required');
		$this->form_validation->set_rules('customer_password','Password','required');

		// intinya membuat warna error menjadi merah :D
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		

		//memberikan data berisi data yang sesuai dengan $id
		$data['getData'] = $this->Customer_m->getDataWhereId($id)[0];

		// if jika kita belum melakukan submit
		if($this->form_validation->run()==FALSE){
			//menampilkan view 'customer/ubah.php'
			$this->load->view('admin/customer/ubah',$data);
		}
		// jika kita sudah melalukan submit
		else{
			if ($_FILES['customer_image']['name'] == "")
			{
				//memanggil fungsi insertData pada model
				$this->Customer_m->updateData($id);
			//redirect / pergi ke halaman 'customer'
				redirect('customer');
			}
			else
			{
				$upload = $this->Customer_m->upload();
				if($upload['result'] == "success"){ 
					$this->Customer_m->updateData($id,$upload['file']['file_name']);
					redirect('customer');
				}else{ 
					$data['error_upload'] = $upload['error'];
					$this->load->view('admin/customer/ubah',$data);
				}
			}
		}
	}

	/*$id adalah parameter
	contoh penggunakan customer/hapus/1 
	*/ 
	public function hapus($id)
	{
		//memanggil fungsi hapusData pada model
		$this->Customer_m->hapusData($id);
		redirect('customer');
	}
}
