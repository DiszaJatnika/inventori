<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dashboard extends CI_Controller
{

	function __construct(){
		parent::__construct();

		if(!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
			redirect('auth');
		}
	} 

	 function index(){

        $data['barang'] = $this->user_m->data_barang();
        $data['totalbarang'] = $this->user_m->totalbarang();
        $data['barangmasuk'] = $this->user_m->barangmasuk();
        $data['barangkeluar'] = $this->user_m->barangkeluar();
        $data['user'] = $this->user_m->user();


		$this->load->view('templates/head/dashboard');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/dashboard', $data);
	}

	public function user(){

        $data['barang'] = $this->user_m->data_barang();
        $data['totalbarang'] = $this->user_m->totalbarang();
        $data['barangmasuk'] = $this->user_m->barangmasuk();
        $data['barangkeluar'] = $this->user_m->barangkeluar();
        $data['user'] = $this->user_m->user();


		$this->load->view('templates/head/dashboard');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/dashboard', $data);
	}
}