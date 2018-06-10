<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {
	
	public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('users');


       if($result->num_rows() == 1){
           return $result->row(0);
       } else {
           return false;
       }
   }

}
