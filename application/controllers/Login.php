<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_m');
	}
	
	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$result = $this->Login_m->login($username, $password);

			if($result){
				$user_data = array(
					'id' => $result->id,
					'username' => $username,
					'level' => $result->fk_id_level,
					'logged_in' => true,
					'fk_customers_id' => $result->fk_customer_id,
				);
				$this->session->set_userdata($user_data);

        // Set message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				if ($user_data['level'] == '1') {
					redirect('Customer');
				}else{
					redirect('Home','refresh');
				}
			} else {
        // Set message
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('Login/login');
			}       
		}
	}
	public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('Login/login');
    }

    public function register()
    {
    	$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('register');
		} else {
			$set_customer = array(
				'customer_firstname' => $this->input->post('customer_firstname'),
				'customer_lastname' => $this->input->post('customer_lastname'),
				'customer_address' => $this->input->post('customer_address'),
				'customer_telp' => $this->input->post('customer_telp'),
			);
			$this->db->insert('customer',$set_customer);
			$id = $this->db->insert_id();
			$set_users = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'fk_id_level' => 2,
				'fk_employee_id' => null,
				'fk_customer_id' => $id
			);
			$this->db->insert('users',$set_users);
			redirect('Login/login','refresh');       
		}
    }

}
