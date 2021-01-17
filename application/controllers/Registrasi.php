<?php
/**
* 
*/
class Registrasi extends CI_Controller
{
	

	function index(){
		$this->load->view('templates/head');
		$this->load->view('registrasi/registrasi');
		$this->load->view('templates/switcher');
		$this->load->view('registrasi/footer');
	}

	public function tambah_aksi()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$name		= $this->input->post('name');
		$level		= $this->input->post('level');


		$data = array(
			'username'	=> $username,
			'password'	=> sha1($password),
			'name'		=> $name,
			'level'		=> $level
 
		);

		$this->m_registrasi->input_data($data, 'user');

		redirect('registrasi');
	}
}