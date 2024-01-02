<?php

class Obat extends CI_Controller{

	public function index()
	{
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Report Obat';
		
		$this->session->unset_userdata('tgl_awal');
        $this->session->unset_userdata('tgl_akhir');
		//$data['pasien'] = $this->model_app->get_ps($limit,$start);
		//$data['pasien'] = $this->model_ps->getKodePs();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('report/obat', $data);
		$this->load->view('templates/footer');
	}
	
	function cari(){
		$tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
		$tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
		$sess_data=array(
			'tgl_awal'=>$tgl_awal,
			'tgl_akhir'=>$tgl_akhir
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dt_result'=> $this->model_app->getReport_obat($tgl_awal,$tgl_akhir),
			'tgl_awal'=>date("Y-m-d",strtotime($this->session->userdata('tgl_awal'))),
			'tgl_akhir'=>date("Y-m-d",strtotime($this->session->userdata('tgl_akhir'))),
		);
		//$data['dt_result'] = $this->model_app->getReport($tgl_awal,$tgl_akhir);
		//var_dump($data);die;
		$data['no'] = 1;
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Report Obat';

		$this->load->view('report/result_obat',$data);
	}
}
?>