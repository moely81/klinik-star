<?php

class Dashboard extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata['email']){
			redirect();
		}

	}

	public function index(){
	    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		if($user['role_id'] == 1){
			$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title'] = 'Dashboard';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		}elseif($user['role_id'] == 2){
			$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title'] = 'Dashboard';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_user', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		}else{
			$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['title'] = 'Dashboard';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_hrd', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');	
		}
	}
}		
?>