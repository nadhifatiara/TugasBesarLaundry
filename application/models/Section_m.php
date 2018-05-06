<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_m extends CI_Model {

	public function getData()
	{
		//untuk select column
		$this->db->select('*');
		//untuk from table section
		$this->db->from("section");
		//$get eksekusi fungsi select
		//hasil eksesusi = "select * from section"

		
		$query = $this->db->get();
		//untuk merubah table menjadi array
		return $query->result_array();
	}


	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("section");
		$this->db->where('section_id',$id);
		return $this->db->get()->result_array();
	}

	public function insertData()
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'section_id' yang dikiri harus sama seperti di table
			'section_id' yang dikanan harus menurut name inputnya */
			'section_id' => $this->input->post('section_id'),
			'section_name' => $this->input->post('section_name'),
			'section_costperkilo' => $this->input->post('section_costperkilo')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();
		/* eksekusi query insert into "section" diisi dengan variable $data
		face2face ae lek bingung :| */
		$this->db->insert("section",$data);
	}

	public function updateData($id)	
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'section_id' yang dikiri harus sama seperti di table
			'section_id' yang dikanan harus menurut name inputnya */
			'section_id' => $this->input->post('section_id'),
			'section_name' => $this->input->post('section_name'),
			'section_costperkilo' => $this->input->post('section_costperkilo')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('section_id',$id);
		/*eksekusi update section set $data from section where id=$id
		jika berhasil return berhasil */
		if($this->db->update("section",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		//mengeset where id=$id
		$this->db->where('section_id',$id);
		/* eksekusi delete from section where id=$id 
		jika berhasil return berhasil*/
		if($this->db->delete("section")){
			return "Berhasil";
		}
	}
}
