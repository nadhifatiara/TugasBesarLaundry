<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model {

	public function order_call()
	{
		$data = array(
			'fk_users_customer' => $this->session->userdata('id'),
			'address' => $this->input->post('address'),
			'fk_perfume' => $this->input->post('perfume'),
			'fk_typelaundry' => $this->input->post('typelaundry'),
			'status' => 1
		);
		$this->db->insert('transaksi',$data);
		$id = $this->db->insert_id();
		return $this->db->where('id',$id)->get('transaksi')->result()[0];
	}
	public function get_harga($id)
	{
		$this->db->select('(perfume.perfume_costperkilo+typelaundry.typelaundry_costperkilo) as costperkilo');
		$this->db->join('perfume','transaksi.fk_perfume=perfume.perfume_id');
		$this->db->join('typelaundry','transaksi.fk_typelaundry=typelaundry.typelaundry_id');
		$this->db->where('id',$id);
		return $this->db->get('transaksi')->row(0)->costperkilo;
	}

	public function getData()
	{
		$this->db->select("transaksi.*,(select concat(firstname,' ',lastname) from users where id=transaksi.fk_users_customer) as customer_name,(perfume.perfume_name) as perfume,(typelaundry.typelaundry_name) as typelaundry,transaksi.weight_item as weight,
			((perfume.perfume_costperkilo+typelaundry.typelaundry_costperkilo)*transaksi.weight_item) as harga");
		$this->db->join('perfume','transaksi.fk_perfume=perfume.perfume_id');
		$this->db->join('typelaundry','transaksi.fk_typelaundry=typelaundry.typelaundry_id');
		return $this->db->order_by('date','desc')->get('transaksi')->result_array();
	}

	public function getDataCustomer()
	{
		$id_customer = $this->session->userdata('id');
		$this->db->select("transaksi.*,(select concat(firstname,' ',lastname) from users where id=transaksi.fk_users_customer) as customer_name,(perfume.perfume_name) as perfume,(typelaundry.typelaundry_name) as typelaundry,transaksi.weight_item as weight,
			((perfume.perfume_costperkilo+typelaundry.typelaundry_costperkilo)*transaksi.weight_item) as harga");
		$this->db->join('perfume','transaksi.fk_perfume=perfume.perfume_id');
		$this->db->join('typelaundry','transaksi.fk_typelaundry=typelaundry.typelaundry_id');
		$this->db->where('fk_users_customer',$id_customer);
		return $this->db->order_by('date','desc')->get('transaksi')->result_array();
	}
	public function getDataStatus($status)
	{
		$this->db->select("transaksi.*,(select concat(firstname,' ',lastname) from users where id=transaksi.fk_users_customer) as customer_name,(perfume.perfume_name) as perfume,(typelaundry.typelaundry_name) as typelaundry,transaksi.weight_item as weight,
			((perfume.perfume_costperkilo+typelaundry.typelaundry_costperkilo)*transaksi.weight_item) as harga");
		$this->db->join('perfume','transaksi.fk_perfume=perfume.perfume_id');
		$this->db->join('typelaundry','transaksi.fk_typelaundry=typelaundry.typelaundry_id');
		return $this->db->where('status',$status)->order_by('date','desc')->get('transaksi')->result_array();
	}
	public function get_typelaundry()
	{
		return $this->db->get('typelaundry')->result_array();
	}
	public function get_perfume()
	{
		return $this->db->get('perfume')->result_array();
	}
	
	public function order_come($id)
	{
		$id_courier = $this->session->userdata('id');
		$set = array(
			'fk_users_courier' => $id_courier,
			'status' => 2
		);
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
	}
	public function order_transaction($id)
	{
		$set['weight_item'] = $this->input->post('weight');
		$set['status'] = 3;
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
	}
	public function order_wash($id)
	{
		$set['status'] = 4;
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
	}
	public function order_clear($id)
	{
		$set['status'] = 5;
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
	}
	public function order_take($id)
	{
		$set['order_datetake'] = date('Y-m-d');
		$set['status'] = 6;
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
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