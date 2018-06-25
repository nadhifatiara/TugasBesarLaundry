<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model {

	public function getDataCustomer()
	{
		$id_customer = $this->session->userdata('fk_customers_id');
		return $this->db->where('fk_customers_id',$id_customer)->where('order_status !=',6)->order_by('order_date','desc')->get('order')->result_array();
	}
	public function getDataStatus($status)
	{
		return $this->db->where('order_status',$status)->order_by('order_date','desc')->get('order')->result_array();
	}
	public function get_typelaundry()
	{
		return $this->db->get('typelaundry')->result_array();
	}
	public function get_perfume()
	{
		return $this->db->get('perfume')->result_array();
	}
	public function order_call()
	{
		$id_customer = $this->session->userdata('fk_customers_id');
		$data = array(
			'order_date'=>date('Y-m-d'),
			'order_address'=>$this->input->post('order_address'),
			'order_cost'=>$this->input->post('order_cost'),
			'order_status'=>1,
			'fk_customers_id'=>$id_customer
		);
		$this->db->insert('order',$data);
		return $this->db->insert_id();
	}
	public function order_come($id)
	{
		$id_employee = $this->session->userdata('id');
		$set = array(
			'fk_employee_id' => $id_employee,
			'order_status' => 2
		);
		$this->db->where('order_id',$id);
		$this->db->update('order',$set);
	}
	public function order_transaction($id)
	{
		$set = $this->input->post();
		$set['order_status'] = 3;
		$this->db->where('order_id',$id);
		$this->db->update('order',$set);
	}
	public function order_wash($id)
	{
		$set['order_status'] = 4;
		$this->db->where('order_id',$id);
		$this->db->update('order',$set);
	}
	public function order_clear($id)
	{
		$set['order_status'] = 5;
		$this->db->where('order_id',$id);
		$this->db->update('order',$set);
	}
	public function order_take($id)
	{
		$set['order_datetake'] = date('Y-m-d');
		$set['order_status'] = 6;
		$this->db->where('order_id',$id);
		$this->db->update('order',$set);
	}
}

/* order status
1. Ordered belum dijemput
2. Udah dijemput
3. Udah diambil dari tukang jemput
4. Udah dikerjakan (poses pencucian)
5. Udah selesai
6. Udah diambil
*/