<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth extends CI_Controller {
    
    public function index()
	{
		 //validasi inputan login
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
		$this->load->view('templates/head/dashboard');
		$this->load->view('master/login');
	}  
	
	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'username','required', [
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'password','required', [
			'required' => 'Password wajib diisi!']);
		

		if ($this->form_validation->run()== FALSE){
			$this->load->view('templates/head/dashboard');
			$this->load->view('master/login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = MD5($password);

			$cek = $this->login_model->cek_login($user, $pass);

			if($cek->num_rows() > 0){
				foreach ($cek->result() as $ck) {

					$sess_data['user_id'] = $ck->user_id;
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;

					$this->session->set_userdata($sess_data);
					
				}
				if($sess_data['level'] == 'admin'){
					redirect('dashboard');
				}else{
					redirect('dashboard/user');
				}
				
			}else{
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
					redirect('auth');
			}
		}
	}
 
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}
