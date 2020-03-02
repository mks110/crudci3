//mengatur session pada admin
<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){ //mengatur session status jika username dan password benar dimasukan
			redirect(base_url("login")); //mendirect ke halaman login 
		}
	}

	function index(){
		$this->load->view('v_admin'); //memunculkan view halaman admin
	}
}