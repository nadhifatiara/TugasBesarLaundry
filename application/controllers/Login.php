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
					'logged_in' => true
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

				redirect('user/login');
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

}