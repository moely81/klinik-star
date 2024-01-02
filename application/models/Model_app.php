<?php

class Model_app extends CI_Model
{
	public function get_absill($limit,$start){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $query = $this->db->get('',$limit,$start);
			
	}
	
	function jumlah_data_absill(){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $ab = $this->db->get();
		
	}
	
	public function get_absill_verified($limit,$start){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->where('absill.status', 0);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $query = $this->db->get('',$limit,$start);
			
	}
	
	public function get_absill_approved($limit,$start){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->where('absill.status', 1);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $query = $this->db->get('',$limit,$start);
			
	}
	
	function jumlah_data_absill_verified(){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->where('absill.status', 0);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $ab = $this->db->get();
		
	}
	
	function jumlah_data_absill_approved(){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $tahun);
		$this->db->where('absill.status', 1);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $ab = $this->db->get();
		
	}
	
	public function get_absill_user(){
		$bulan = date('Y-m');
		$this->db->select('*');
		$this->db->from('absill');
		$this->db->join('dt_kary','dt_kary.nik = absill.nik');
		$this->db->like('absill.tgl', $bulan);
		$this->db->order_by('tgl', 'DESC'); 
		return $query = $this->db->get();
		
	}
	
	public function get_injury($limit,$start){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('injury');
		$this->db->join('dt_kary','dt_kary.nik = injury.nik');
		$this->db->like('injury.tgl', $tahun);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $query = $this->db->get('',$limit,$start);
			
	}
	
	function jumlah_data_injury(){
        $tahun = date('Y');
		$this->db->select('*');
		$this->db->from('injury');
		$this->db->join('dt_kary','dt_kary.nik = injury.nik');
		$this->db->like('injury.tgl', $tahun);
		$this->db->order_by('tgl', 'DESC'); 
		
		return $ab = $this->db->get();
		
	}
	
	public function get_ps($limit,$start){

		$this->db->order_by('kode', 'DESC'); 
		$query = $this->db->get('dt_ps',$limit,$start);
		return $query->result();	
	}
	
	public function get_ps_all(){

		$this->db->order_by('kode', 'DESC'); 
		$query = $this->db->get('dt_ps');
		return $query->result();	
	}
	
	function jumlah_data_ps(){
		
		$ab = $this->db->get('dt_ps');
		return $ab->num_rows();
		
	}
	
	public function cekkodeps(){

		$this->db->select('RIGHT(dt_ps.kode,4) as kode1', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('dt_ps'); 
		$hasil = $query->row();
		return $hasil->kode1;
	}
	
	public function cekkodedmr(){

		$this->db->select('RIGHT(dmr2.no_dmr,5) as kode1', FALSE);
		$this->db->order_by('no_dmr','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('dmr2'); 
		$hasil = $query->row();
		return $hasil->kode1;
	}
	
	public function detail_ps($id){

		$this->db->get_where('dt_ps', ['id' => $id])->row_array();
	}
	
	public function get_dmr($limit,$start){

		$this->db->select('*');
		$this->db->from('dt_ps');
		$this->db->join('dmr2','dmr2.kode = dt_ps.kode');
		$this->db->order_by('tgl', 'DESC'); 
		
		$query = $this->db->get('',$limit,$start);
		return $query->result();	
	}

	public function get_dmr_detail($id){

		$this->db->select('*');
		$this->db->from('dt_ps');
		$this->db->join('dmr2','dmr2.kode = dt_ps.kode');
		$this->db->order_by('tgl', 'DESC'); 
		
		$query = $this->db->get_where('',['dmr2.no_dmr' => $id]);
		return $query->row_array($id);	
	}
	
	public function get_dmr_detail_obat($id){
		$this->db->select('*');
		$this->db->from('obat_erp');
		$this->db->join('out_obat','out_obat.kd_obat = obat_erp.kd_obt');
		//$this->db->order_by('tgl', 'DESC'); 
		
		return $query = $this->db->get_where('',['out_obat.id' => $id]);
			
	}
	
	function jumlah_data_dmr(){
		
		$this->db->select('*');
		$this->db->from('dmr2');
		$this->db->join('dt_ps','dt_ps.kode = dmr2.kode');
		$this->db->order_by('tgl', 'DESC'); 
		$ab = $this->db->get('');
		return $ab->num_rows();
	}

	public function get_obat($limit,$start){

		$query = $this->db->get('obat_erp',$limit,$start);
		return $query->result();	
	}
	
	function jumlah_data_obat(){
		$ab = $this->db->get('obat_erp');
		return $ab->num_rows();
	}

	public function save(){    
		
  		$this->db->insert('dt_ps', $data); // Untuk mengeksekusi perintah insert data  }
  	}

  	public function diagnosa(){
  		$query = $this->db->get('diagnosa');
  		return $query->result();
  	}

  	public function departemen(){
  		$query = $this->db->get('departemen');
  		return $query->result();
  	}

  	public function obat(){
  	    $this->db->order_by('nm_obt', 'ASD');
  		$query = $this->db->get('obat_erp');
  		return $query->result();
  	}

  	public function karyawan(){
  		$query = $this->db->get('dt_kary');
  		return $query->result();
  	}
  	
  	public function user(){
  		$query = $this->db->get('user');
  		return $query->result();
  	}

  	public function search($kode){
  		$this->db->like('nama', $kode);
  		$this->db->order_by('kode', 'DESC');
  		$query = $this->db->get('dt_ps');
  		return $query->result();
  	}

  	public function search_kary($kode){
  		$this->db->like('nama', $kode);
  		$this->db->order_by('no', 'DESC');
  		$query = $this->db->get('dt_kary');
  		return $query->result();
  	}
  	
  	function getReport($tgl_awal,$tgl_akhir){
  		$this->db->select('*');
  		$this->db->from('absill');
  		$this->db->join('dt_kary', 'absill.nik = dt_kary.nik');
  		$this->db->where('tgskt1 >=',$tgl_awal);
        $this->db->where('tgskt2 <=',$tgl_akhir);
  		return $query = $this->db->get()->result();
    }
    
    function getReport_kunj($tgl_awal,$tgl_akhir){
  		$this->db->select('*');
  		$this->db->from('dmr2');
  		$this->db->join('dt_ps', 'dmr2.kode = dt_ps.kode');
  		$this->db->where('tgl >=',$tgl_awal);
        $this->db->where('tgl <=',$tgl_akhir);
        $this->db->order_by('tgl', 'ASC');
  		return $query = $this->db->get()->result();
    }
    
    function getReport_obat($tgl_awal,$tgl_akhir){
  		$this->db->select('*');
  		$this->db->from('out_obat');
  		$this->db->join('dt_ps', 'out_obat.kode = dt_ps.kode');
  		$this->db->join('obat_erp', 'obat_erp.kd_obt = out_obat.kd_obat');
  		$this->db->where('tgl >=',$tgl_awal);
        $this->db->where('tgl <=',$tgl_akhir);
        $this->db->order_by('tgl', 'ASC');
  		return $query = $this->db->get()->result();
    }
    
    function getReport_dmr($tgl_awal,$tgl_akhir){
  		$this->db->select('*');
  		$this->db->from('dmr2');
  		$this->db->join('dt_ps', 'dmr2.kode = dt_ps.kode');
  		$this->db->where('tgl >=',$tgl_awal);
        $this->db->where('tgl <=',$tgl_akhir);
        $this->db->order_by('tgl', 'ASC');
  		return $query = $this->db->get()->result();
    }
    public function get_medclaim(){

        $this->db->select('*');
		$this->db->from('db_medclaim');
		$this->db->join('dt_kary','dt_kary.nik = db_medclaim.nik');
		$this->db->order_by('id', 'ASC'); 
		return $query = $this->db->get()->result();
	}
  }
  ?>

