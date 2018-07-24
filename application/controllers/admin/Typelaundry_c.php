<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typelaundry_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Typelaundry_m');
		if($this->session->userdata("id") == null){
			redirect("Home");
		}
	}
	public function index()
	{
		$data['getData'] = $this->Typelaundry_m->getData();
		$this->load->view('admin/typelaundry/typelaundry.php',$data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('typelaundry_name','Name','required');
		$this->form_validation->set_rules('typelaundry_costperkilo','Cost Per Kilo','required');
		if($this->form_validation->run() == false)
			$this->load->view('admin/typelaundry/add.php');
		else{
			$this->Typelaundry_m->insertData();
			redirect('admin/Typelaundry_c');
		}
	}
	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('typelaundry_name','Name','required');
		$this->form_validation->set_rules('typelaundry_costperkilo','Cost Per Kilo','required');
		$data['getData'] = $data['getData'] = $this->Typelaundry_m->getDataById($id)[0];
		if($this->form_validation->run() == false)
			$this->load->view('admin/typelaundry/update.php',$data);
		else{
			$this->Typelaundry_m->updateData($id);
			redirect('admin/Typelaundry_c');
		}
	}
	public function delete($id)
	{
		$this->Typelaundry_m->deleteData($id);
		redirect('admin/Typelaundry_c','refresh');
	}
}