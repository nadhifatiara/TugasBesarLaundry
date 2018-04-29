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
	public function getDataById($id)
	{
		$this->db->where('typelaundry_id',$id);
		$query = $this->db->get("typelaundry");
		return $query->result_array();
	}
	public function insertData()
	{
		$data = array(
			'typelaundry_name' => $this->input->post('typelaundry_name'),
			'typelaundry_costperkilo' => $this->input->post('typelaundry_costperkilo')
		);
		$this->db->insert('typelaundry',$data);
	}
	public function updateData($id)
	{
		$data = array(
			'typelaundry_name' => $this->input->post('typelaundry_name'),
			'typelaundry_costperkilo' => $this->input->post('typelaundry_costperkilo')
		);
		$this->db->set($data);
		$this->db->where('typelaundry_id',$id);
		$this->db->update('typelaundry',$data);
	}
	public function deleteData($id)
	{
		$this->db->where('typelaundry_id',$id);
		$this->db->delete('typelaundry');
	}
}