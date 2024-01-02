<?php

class Input_absill extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata['email']){
			redirect();
		}

	}

	public function index()
	{
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['karyawan'] = $this->model_app->karyawan();
		$data['title'] = 'Input Absill';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_hrd', $data);
		$this->load->view('hrd/input_absill', $data);
		$this->load->view('templates/footer');
	
	}
	
public function choose($id){

		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Input Absill';
		$data['karyawan'] = $this->model_app->karyawan();
		$data['detail'] =  $this->db->get_where('dt_kary', ['no' => $id])->row_array($id);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_hrd', $data);
		$this->load->view('hrd/input_absill', $data);
		$this->load->view('templates/footer');
	}	

}
?>