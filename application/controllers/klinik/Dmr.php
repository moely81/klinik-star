<?php

class Dmr extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata['email']){
			redirect();
		}

	}

	public function index()
	{
		$this->load->library('pagination');
		$limit = 10;
		$jumlah_data_dmr = $this->model_app->jumlah_data_dmr();
		$config['base_url'] = 'https://klinikstar.online/klinik/dmr/index';
		$config['total_rows'] = $jumlah_data_dmr;
		$config['per_page'] = $limit;
		$start = $this->uri->segment(4);


		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';



		$this->pagination->initialize($config);
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'DMR';
		$data['kary'] = $this->model_app->get_dmr($limit,$start);
		//$data['kary'] = $this->model_dmr->get_dmr();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/dmr');
		$this->load->view('templates/footer');
	}
	
	public function detail_dmr($id){
		$data['no'] = 1;
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail DMR';
		$data['detail_obat'] = $this->model_app->get_dmr_detail_obat($id)->result();
		$data['detail_dmr'] =  $this->model_app->get_dmr_detail($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/detail_dmr', $data);
		$this->load->view('templates/footer');
	}	
}
?>