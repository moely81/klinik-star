<?php

class Cari_ps extends CI_Controller{
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
		$data['pasien'] = $this->model_app->search($kode);
		//echo "<a href='#' class='list-group-item list-group-item-action border-1'>".'mulyanto'."</a>";
		//var_dump($data);die;
		$data['title'] = 'Input DMR';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/cari_ps', $data);
		$this->load->view('templates/footer');
	//}
	//public function diagnosa(){
	//	$data['diagnosa'] = $this->db->get('diagnosa'); return->result();
	}
	
}
?>