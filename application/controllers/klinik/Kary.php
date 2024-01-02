<?php

class Kary extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata['email']){
			redirect();
		}

	}

	public function index()
	{
		//$this->load->library('pagination');
		//$limit = 8;
		//$jumlah_data_ps = $this->model_app->jumlah_data_ps();
		//$config['base_url'] = 'https://klinikstar.online/klinik/ps/index';
		//$config['total_rows'] = $jumlah_data_ps;
		//$config['per_page'] = $limit;
		//$start = $this->uri->segment(4);


		//$config['first_link']       = 'First';
		//$config['last_link']        = 'Last';
		//$config['next_link']        = 'Next';
		//$config['prev_link']        = 'Prev';
		//$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		//$config['full_tag_close']   = '</ul></nav></div>';
		//$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		//$config['num_tag_close']    = '</span></li>';
		//$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		//$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		//$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		//$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		//$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		//$config['prev_tagl_close']  = '</span>Next</li>';
		//$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		//$config['first_tagl_close'] = '</span></li>';
		//$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		//$config['last_tagl_close']  = '</span></li>';



		//$this->pagination->initialize($config);

		$dariDB = $this->model_app->cekkodeps();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 1, 4);
		$kodeps = $nourut + 1;
		$data = array('kode' => $kodeps);


		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Karyawan';
		$data['departemen'] = $this->model_app->departemen();
		$data['pasien'] = $this->model_app->karyawan();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/kary', $data);
		$this->load->view('templates/footer');
	}	

	public function tambah(){    

		$kode 		= $this->input->post('kode');      
		$nama 		= $this->input->post('nama');      
		$jk 		= $this->input->post('jk');      
		$tgl_lhr 	= $this->input->post('tgl_lhr');      
		$perush 	= $this->input->post('perush');
		$dept		= $this->input->post('dept');
		$posisi 	= $this->input->post('posisi');
		
		
		$data = array(
			'kode'  	=> $kode,
			'nama'  	=> $nama,
			'jk'  		=> $jk,
			'tgl_lhr'  	=> $tgl_lhr,
			'perush'  	=> $perush,
			'dept'  	=> $dept,
			'posisi'  	=> $posisi,
		);

		$this->db->insert('dt_ps', $data);
		//$this->model_app->save($data, 'dt_ps');
		redirect('klinik/ps');      
	}
	
	public function detail_ps($id){
	
		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Pasien';
		$data['departemen'] = $this->model_app->departemen();
		$data['detail_ps'] =  $this->db->get_where('dt_ps', ['id' => $id])->row_array($id);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/detail_ps', $data);
		$this->load->view('templates/footer');
	}	
	public function hapus($id){
		$this->db->delete('dt_kary', ['no' => $id]);
		redirect('klinik/kary'); 
	}
	}
?>