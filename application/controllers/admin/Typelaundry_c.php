<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typelaundry_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Typelaundry_m');
	}
	public function index()
	{
		$data['getData'] = $this->Typelaundry_m->getData();
		$this->load->view('admin/typelaundry/typelaundry.php',$data);
	}
	public function input()
	{
		$this->load->view('admin/input');
	}
	public function update()
	{
		$this->load->view('admin/update');
	}
}