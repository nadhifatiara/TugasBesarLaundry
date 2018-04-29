<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typelaundry_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getData()
	{
		$query = $this->db->get("typelaundry");
		return $query->result_array();
	}
}