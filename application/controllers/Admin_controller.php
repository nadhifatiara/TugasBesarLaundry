<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/admin');
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