<?php

class Dmr extends CI_Controller{
	public function index()
	{

		$data['kary'] = $this->model_dmr->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('klinik/dmr', $data);
		$this->load->view('templates/footer');
	}	
}
?>

