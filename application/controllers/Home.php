<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Typelaundry_m');
		$this->load->model('Perfume_m');
		$data['perfume'] = $this->Perfume_m->getData();
		$data['typelaundry'] = $this->Typelaundry_m->getData(); 
		$this->load->view('home/home',$data);
	}
	public function order()
	{
		if (!$this->session->userdata('logged_in')) {
			echo '<script>alert("Harus Login Dolo")</script>';
			redirect('Login/login','refresh');
		}
		$this->load->model('Order_m');
		$order_data = $this->Order_m->order_call();
		$this->session->set_flashdata('order_data',$order_data);
		redirect('Home');
	}




	public function perfume()
	{
		$this->load->model('Perfume_m');

		$limit_per_page=6;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records= $this->Perfume_m->get_total();

		if($total_records > 0 ){
			$data['perfume'] = $this->Perfume_m->get_all_artikel($limit_per_page,$start_index);
			$config['base_url'] = base_url().'index.php/Home/perfume';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);

			$data['links'] = $this->pagination->create_links();
		}

		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('home/perfume',$data);
		$this->load->view('home/footer');
	}
	public function list_order()
	{
		if (!$this->session->userdata('logged_in')) {
			echo '<script>alert("Harus Login Dolo")</script>';
			redirect('Login/login','refresh');
		}
		$this->load->model('Order_m');
		$data['list_order'] = $this->Order_m->getDataCustomer();
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('home/list_order',$data);
		$this->load->view('home/footer');
	}
	

	public function about()
	{
		$this->load->view('home/header');
		$this->load->view('home/navbar');
		$this->load->view('home/about');
		$this->load->view('home/footer');
	}
}
