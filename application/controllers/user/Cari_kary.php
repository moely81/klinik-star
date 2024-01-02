<?php

class Cari_kary extends CI_Controller{
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
		//$data['diagnosa'] = $this->model_app->diagnosa();
		$kode = $this->input->post('cari');
		$data['karyawan'] = $this->model_app->search_kary($kode);
		//echo "<a href='#' class='list-group-item list-group-item-action border-1'>".'mulyanto'."</a>";
		//var_dump($data);die;
		$data['title'] = 'Input Absill';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_user', $data);
		$this->load->view('user/cari_kary', $data);
		$this->load->view('templates/footer');
	//}
	//public function diagnosa(){
	//	$data['diagnosa'] = $this->db->get('diagnosa'); return->result();
	}
	
}
?>