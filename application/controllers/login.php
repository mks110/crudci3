<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login'); //memanggil model login

	}

	function index(){
		$this->load->view('v_login'); //memunculkan view login
	}

	function aksi_login(){
		$username = $this->input->post('username'); //menginput username berdasarkan database 
		$password = $this->input->post('password'); //menginput password berdasarkan database 
		$where = array(
			'username' => $username, //menjadikan data username menjadi variable
			'password' => md5($password) ////menjadikan data password menjadi variable dengan data bertype md5
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();  //mencocokan data dari field admin berdasarkan username dan password
		
		if($cek > 0){ //mencocokan data 

			$data_session = array( //membuat data session
				'nama' => $username, // memanggil session nama
				'status' => "login" // memanggil session status
				);

			$this->session->set_userdata($data_session); //memunculkan session berdasarkan data session

			redirect(base_url("admin")); //meredirect halaman admin

		}else{
			echo "Username dan password salah !"; //membuat pengecualian jika username / password (jika username atau password salah akan muncul peringatan) 
		}
	}

	function logout(){
		$this->session->sess_destroy(); //mendestroy session
		redirect(base_url('login')); //membuka halaman login
	}
}