<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		//$data['dashboard'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

	}

	public function index()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if($this->form_validation->run() == false){
			$data['title'] = 'Login';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login(){
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user){
			if($user['is_active'] == 1){
				if(password_verify($password, $user['password'])){
					$data = [
						'email' 	=>$user['email'],
						'role_id' 	=>$user['role_id']
					];
					
					$this->session->set_userdata($data);
					redirect('dashboard');
				}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div> ');
					redirect('auth');					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum diaktivasi, silahkan hubungi Admin!</div> ');
					redirect('auth');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum punya account, silahkan buat account dulu!</div> ');
				redirect('auth');
			}
		}

		public function register()
		{

			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
				[
					'matches' =>'password dont match',
					'min_length' => 'password too short']);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');				

			if($this->form_validation->run() == false)
			{
				$data['title'] = 'Registrasi';
				$this->load->view('templates/header', $data);
				$this->load->view('auth/register');
			}else {

				$nama 			= htmlspecialchars($this->input->post('name', true));
				$email 			= htmlspecialchars($this->input->post('email', true));
				$image 			= 'default.png';
				$password 		= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$role_id 		= 2;
				$is_active 		= 1;
				$date_create	= time();


				$data = array(
					'nama' 			=>$nama,
					'email' 		=>$email,
					'image' 		=>$image,
					'password' 		=>$password,
					'role_id' 		=> $role_id,
					'is_active' 	=> $is_active,
					'date_create' 	=> $date_create,
				);


				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda sudah berhasil dibuat, Silahkan Login!</div> ');
				redirect('auth'); 
			}


		}

		public function logout(){
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Log Out</div> ');
			redirect(); 
		}
	}
	?>