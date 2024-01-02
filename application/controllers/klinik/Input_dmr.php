<?php

class Input_dmr extends CI_Controller{
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
		$data['diagnosa'] = $this->model_app->diagnosa();
		$data['obat'] = $this->model_app->obat();
		$data['title'] = 'Input DMR';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/input_dmr', $data);
		$this->load->view('templates/footer');
	//}
	//public function diagnosa(){
	//	$data['diagnosa'] = $this->db->get('diagnosa'); return->result();
	}
	public function input($nik){
	//$nik = 'mulyanto';
	//$nik = $this->input->post('nik');
		$data = $this->db->get_where('dt_ps', ['nama' => $nik]) -> row_array($nik);

	//$data_pegawai = array(
      //      'kode'    =>  $pegawai['kode'],
        //    'nama'    =>  $pegawai['nama'],
		//	'jk'      =>  $pegawai['jk'],
		//	'umur'    =>  umurmu($pegawai['tgl_lhr']),
		//	'perush'  =>  $pegawai['perush'],
		//	'dept'    =>  $pegawai['dept'],
		//	'posisi'    =>  $pegawai['posisi'],);


		echo json_encode($data);

		var_dump($data); die;
	}
	public function choose($id){

		$dariDB = $this->model_app->cekkodedmr();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 1, 4);
		$kodedmr = $nourut + 1;
		$data = array('kode' => $kodedmr);

		$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Input DMR';
		$data['diagnosa'] = $this->model_app->diagnosa();
		$data['obat'] = $this->model_app->obat();
		$data['detail'] =  $this->db->get_where('dt_ps', ['id' => $id])->row_array($id);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klinik/input_dmr', $data);
		$this->load->view('templates/footer');
	}	

	public function simpan_dmr(){
		$id 		= $this->input->post('kode');      
		$tgl 		= $this->input->post('tgl');      
		$kode 		= $this->input->post('nik');
		$no_dmr		= $this->input->post('kode');      
		$kunj 		= $this->input->post('kunj');      
		$accid 		= $this->input->post('accid');
		$ohr		= $this->input->post('ohr');
		$detail 	= $this->input->post('detail');
		$invest		= $this->input->post('invest');      
		$diag 		= $this->input->post('diag');
		$treat		= $this->input->post('treat');
		$pic 		= $this->input->post('pic');

		$result = array();
		foreach ($_POST['kd_obt'] as $key => $val) {
			$result[] = array( 
				'id' => $id,
				'tgl' => $tgl,
				'kode' => $kode,
				'kd_obat' => $_POST['kd_obt'][$key],
				'qty' 	=> $_POST['qty'][$key]         
			);      
		} 
		$data = array(
			'no_dmr'  	=> $no_dmr,
			'kode'  	=> $kode,
			'tgl'  		=> $tgl,
			'kunj'  	=> $kunj,
			'accid'  	=> $accid,
			'ohr'  		=> $ohr,
			'detail'  	=> $detail,
			'invest'  	=> $invest,
			'diag'  	=> $diag,
			'treat'  	=> $treat,
			'pic'  		=> $pic,
		);  

		$this->db->insert_batch('out_obat',$result);
		$this->db->insert('dmr2', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data DMR berhasil ditambahkan</div> ');
		redirect('klinik/dmr');
	} 
}
?>