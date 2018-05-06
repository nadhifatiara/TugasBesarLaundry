<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

	public function getData()
	{
		//untuk select column
		$this->db->select('*');
		//untuk from table customer
		$this->db->from("customer");
		//$get eksekusi fungsi select
		//hasil eksesusi = "select * from customer"

		
		$query = $this->db->get();
		//untuk merubah table menjadi array
		return $query->result_array();
	}


	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("customer");
		$this->db->where('customer_id',$id);
		return $this->db->get()->result_array();
	}

	public function insertData($upload_name)
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'customer_id' yang dikiri harus sama seperti di table
			'customer_id' yang dikanan harus menurut name inputnya */
			'customer_id' => $this->input->post('customer_id'),
			'customer_firstname' => $this->input->post('customer_firstname'),
			'customer_lastname' => $this->input->post('customer_lastname'),
			'customer_address' => $this->input->post('customer_address'),
			'customer_telp' => $this->input->post('customer_telp'),
			'customer_email' => $this->input->post('customer_email'),
			'customer_password' => $this->input->post('customer_password')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();
		$data['customer_image'] = $upload_name;
		/* eksekusi query insert into "customer" diisi dengan variable $data
		face2face ae lek bingung :| */
		$this->db->insert("customer",$data);
	}

	public function updateData($id,$upload_name=null)	
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'customer_id' yang dikiri harus sama seperti di table
			'customer_id' yang dikanan harus menurut name inputnya */
			'customer_id' => $this->input->post('customer_id'),
			'customer_firstname' => $this->input->post('customer_firstname'),
			'customer_lastname' => $this->input->post('customer_lastname'),
			'customer_address' => $this->input->post('customer_address'),
			'customer_telp' => $this->input->post('customer_telp'),
			'customer_email' => $this->input->post('customer_email'),
			'customer_password' => $this->input->post('customer_password')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();

		//jika image kosong maka tidak mengubah image
		if($upload_name!=null)
			$data['customer_image'] = $upload_name;
		//mengeset where id=$id
		$this->db->where('customer_id',$id);
		/*eksekusi update customer set $data from customer where id=$id
		jika berhasil return berhasil */
		if($this->db->update("customer",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		//mengeset where id=$id
		$this->db->where('customer_id',$id);
		/* eksekusi delete from customer where id=$id 
		jika berhasil return berhasil*/
		if($this->db->delete("customer")){
			return "Berhasil";
		}
	}

	public function upload(){
        $config['upload_path'] = './assets/upload/customer/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('customer_image')){
            $return = array('result' => 'success', 'file' => $this->upload->data(),
            'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' =>
            $this->upload->display_errors());
            return $return;
        }
    }
}
