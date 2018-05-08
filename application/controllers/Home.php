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
		$this->load->view('home/home');
	}
	public function perfume()
	{
		$this->load->model('Perfume_m');

		$limit_per_page=3;
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

		
		$this->load->view('home/perfume',$data);
	}

}
