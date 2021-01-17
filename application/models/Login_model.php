<?php

class Login_model extends CI_Model{

	public function cek_login($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get('user');
        return $query;
    }

    public function getLoginData($user, $pass){
    	$u = $user;
    	$p = md5($pass);

    	$query_cekLogin = $this->db->get_where('user', array('username'=> $u, 'password' => $p));

    	if (count($query_cekLogin->result()) > 0) {
    		foreach ($query_cekLogin->result() as $qck) {
    			foreach ($query_cekLogin->result() as $ck) {
    				$sess_data ['logged_in'] = TRUE;
    				$sess_data ['username'] = $ck->username;
    				$sess_data ['password'] = $ck->password;
    				$sess_data ['level'] = $ck->level;
                    $sess_data ['user_id'] = $ck->user_id;	
    				$this->session->set_userdata($sess_data);
    			}
    			redirect('dashboard');
    		}
    	}else{
    		$this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
    		redirect('auth/login');
    	}
    }
}