<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_m');
	}
	public function finding()
	{
		$data['list_order'] = $this->Order_m->getDataStatus(1);
		$this->load->view('admin/order/order_finding',$data);
	}
	public function come($id)
	{
		$this->Order_m->order_come($id);
		redirect('Admin/Order/transaction/'.$id,'refresh');
	}
	public function transaction($id)
	{
		$data['id'] = $id;
		$data['perkilo'] = $this->Order_m->get_harga($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('weight','Weight','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/order/order_transaction',$data);
		}else{
			$this->Order_m->order_transaction($id);
			redirect('Admin/Order/finding','refresh');
		}
	}
	public function list_transaction()
	{
		$data['list_order'] = $this->Order_m->getDataStatus(3);
		$this->load->view('admin/order/order_list_transaction',$data);
	}
	public function wash($id)
	{
		$this->Order_m->order_wash($id);
		redirect('Admin/Order/list_wash/'.$id,'refresh');
	}
	public function list_wash()
	{
		$data['list_order'] = $this->Order_m->getDataStatus(4);
		$this->load->view('admin/order/order_list_wash',$data);
	}
	public function clear($id)
	{
		$this->Order_m->order_clear($id);
		redirect('Admin/Order/list_clear/'.$id,'refresh');
	}
	public function list_clear()
	{
		$data['list_order'] = $this->Order_m->getDataStatus(5);
		$this->load->view('admin/order/order_list_clear',$data);
	}
	public function take($id)
	{
		$this->Order_m->order_take($id);
		redirect('Admin/Order/taked/'.$id,'refresh');
	}
	public function deliver()
	{
		$data['list_order'] = $this->Order_m->getDataStatus(6);
		$this->load->view('admin/order/order_list_deliver',$data);
	}
	public function delivered($id)
	{
		$set['status'] = 7;
		$this->db->where('id',$id);
		$this->db->update('transaksi',$set);
		$data['id'] = $id;
		$this->load->view('admin/order/order_deliver',$data);
	}
	public function del($id)
	{
		$this->Order_m->order_deliver($id);
		redirect('admin/Order/deliver','refresh');
	}
	public function laporan()
	{
		$data['list_order'] = $this->Order_m->getData();
		$this->load->view('admin/order/order_laporan',$data);
	}
}
