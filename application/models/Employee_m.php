<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model {

	public function getData()
	{
		//untuk select column
		$this->db->select('*');
		//untuk from table employee
		$this->db->from("employee");
		//$get eksekusi fungsi select
		//hasil eksesusi = "select * from employee"

		
		$query = $this->db->get();
		//untuk merubah table menjadi array
		return $query->result_array();
	}


	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("employee");
		$this->db->where('employee_id',$id);
		return $this->db->get()->result_array();
	}

	public function insertData($upload_name)
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'employee_id' yang dikiri harus sama seperti di table
			'employee_id' yang dikanan harus menurut name inputnya */
			'employee_id' => $this->input->post('employee_id'),
			'employee_firstname' => $this->input->post('employee_firstname'),
			'employee_lastname' => $this->input->post('employee_lastname'),
			'employee_address' => $this->input->post('employee_address'),
			'employee_telp' => $this->input->post('employee_telp'),
			'employee_email' => $this->input->post('employee_email'),
			'employee_password' => $this->input->post('employee_password')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();
		$data['employee_image'] = $upload_name;
		/* eksekusi query insert into "employee" diisi dengan variable $data
		face2face ae lek bingung :| */
		$this->db->insert("employee",$data);
	}

	public function updateData($id,$upload_name=null)	
	{
		/* get post data dari form input menurut "name" nya
		contoh <input name="..."> */
		$data = array(
			/* 'employee_id' yang dikiri harus sama seperti di table
			'employee_id' yang dikanan harus menurut name inputnya */
			'employee_id' => $this->input->post('employee_id'),
			'employee_firstname' => $this->input->post('employee_firstname'),
			'employee_lastname' => $this->input->post('employee_lastname'),
			'employee_address' => $this->input->post('employee_address'),
			'employee_telp' => $this->input->post('employee_telp'),
			'employee_email' => $this->input->post('employee_email'),
			'employee_password' => $this->input->post('employee_password')
		);
		/* jika semua sama sperti di table
		gunakan versi simple seprti berikut */
		$data = $this->input->post();

		//jika image kosong maka tidak mengubah image
		if($upload_name!=null)
			$data['employee_image'] = $upload_name;
		//mengeset where id=$id
		$this->db->where('employee_id',$id);
		/*eksekusi update employee set $data from employee where id=$id
		jika berhasil return berhasil */
		if($this->db->update("employee",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		//mengeset where id=$id
		$this->db->where('employee_id',$id);
		/* eksekusi delete from employee where id=$id 
		jika berhasil return berhasil*/
		if($this->db->delete("employee")){
			return "Berhasil";
		}
	}

	public function upload(){
        $config['upload_path'] = './assets/upload/employee/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('employee_image')){
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
