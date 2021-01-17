<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        if($this->session->userdata('level')=='admin'){
            $data['data'] = $this->user_m->tampil_data()->result();
    		
    		$this->load->view('templates/head/tabel');
    	    $this->load->view('templates/sidebar');
    	    $this->load->view('templates/topbar');
    	    $this->load->view('master/user/user_data', $data);
    	    $this->load->view('templates/footer/tabel');
        }else{
        $data = $this->user_m->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level,
        );    
            $this->load->view('templates/head/dashboard');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('templates/eror_user', $data);
        ;
        }
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['data'] = $this->user_m->tampil_data()->result();

        $this->load->view('templates/head/dashboard');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/user/profile', $data);
        $this->load->view('templates/footer/dashboard');
    }

    public function add()
    {
        
        $this->load->view('templates/head/dashboard');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/user/user_form_add');
        $this->load->view('templates/footer/dashboard');

    }

    public function tambah_aksi()
    {
        $user_id  = $this->input->post('user_id');
        $username  = $this->input->post('username');
        $password  = $this->input->post('password');
        $email  = $this->input->post('email');
        $level  = $this->input->post('level');
        $blokir  = $this->input->post('blokir');


        $data = array(
            'user_id'   => $user_id,
            'username'  => $username,
            'password'  => md5($password),
            'email'     => $email,
            'level'     => $level,
            'blokir'    => $blokir

        );

        $this->user_m->insert($data, 'user');
        $this->session->set_flashdata('message_success','<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Data Berhasil Ditambahkan
            </div>');
        redirect('user');
    }

    public function update($id)
    {

        $where = array ('user_id' => $id);
        $data['user'] = $this->user_m->edit_data($where, 'user')->result(); 
        
        $this->load->view('templates/head/dashboard');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/user/user_form_edit', $data);
        $this->load->view('templates/footer/dashboard');
    }

    public function update_aksi(){
        $user_id  = $this->input->post('user_id');
        $username  = $this->input->post('username');
        $password  = $this->input->post('password');
        $email  = $this->input->post('email');
        $level  = $this->input->post('level');
        $blokir  = $this->input->post('blokir');


        $data = array(
            'user_id'   => $user_id,
            'username'  => $username,
            'password'  => md5($password),
            'email'     => $email,
            'level'     => $level,
            'blokir'    => $blokir

        );

        $where = array(
            'user_id' => $user_id
        );

        $this->user_m->update_data($where,$data, 'user');
        $this->session->set_flashdata('message_edit','<div class="alert alert-primary alert-dismissible" role="alert">
            Data Berhasil Diedit
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
        redirect('user');
    }
    public function delete($user_id)
    {
        $where = array ('user_id' => $user_id);
        $this->user_m->hapus_data($where, 'user');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
            Data Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
        redirect('user');
    }
}
