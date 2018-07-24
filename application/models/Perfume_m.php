<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfume_m extends CI_Model {

	public function getData()
	{
		//untuk select column
		$this->db->select('*');
		//untuk from table perfume
		$this->db->from("perfume");
		//$get eksekusi fungsi select
		//hasil eksesusi = "select * from perfume"

		
		$query = $this->db->get();
		//untuk merubah table menjadi array
		return $query->result_array();
	}


	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("perfume");
		$this->db->where('perfume_id',$id);
		return $this->db->get()->result_array();
	}

	public function insertData()
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'perfume_id' yang dikiri harus sama seperti di table
			'perfume_id' yang dikanan harus menurut name inputnya */
			'perfume_id' => $this->input->post('perfume_id'),
			'perfume_name' => $this->input->post('perfume_name'),
			'perfume_costperkilo' => $this->input->post('perfume_costperkilo'),
			'perfume_image' => $this->upload->data('file_name')
		);
		/* eksekusi query insert into "perfume" diisi dengan variable $data
		face2face ae lek bingung :| */
		$this->db->insert("perfume",$data);
	}

	public function updateData($id)	
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'perfume_id' yang dikiri harus sama seperti di table
			'perfume_id' yang dikanan harus menurut name inputnya */
			'perfume_id' => $this->input->post('perfume_id'),
			'perfume_name' => $this->input->post('perfume_name'),
			'perfume_costperkilo' => $this->input->post('perfume_costperkilo')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('perfume_id',$id);
		/*eksekusi update perfume set $data from perfume where id=$id
		jika berhasil return berhasil */
		if($this->db->update("perfume",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		//mengeset where id=$id
		$this->db->where('perfume_id',$id);
		/* eksekusi delete from perfume where id=$id 
		jika berhasil return berhasil*/
		if($this->db->delete("perfume")){
			return "Berhasil";
		}
	}
	public function get_all_artikel($limit = FALSE, $offset = FALSE)
    {
        if($limit){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get('perfume');
        return $query->result_array();
    }
    public function get_total()
    {
        return $this->db->count_all('perfume');
    }
}
