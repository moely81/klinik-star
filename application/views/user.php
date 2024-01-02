<?php

class User extends CI_Controller{

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		//$this->load->view('templates/header');
		//$this->load->view('templates/sidebar', $data);
		//$this->load->view('dashboard');
		//$this->load->view('templates/footer');
	echo 'selamat datang' . $data['user']['email'];

	}
}
?>