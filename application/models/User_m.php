<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_m extends CI_Model {

    public function get($user_id)
    {
        $this->db->from('user');
        if($user_id != null){
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get();
        return $query;
    }
        
    public function total_jml_user()
    {
        $query = $this->db->get('user');
        if ($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    } 

    public function insert($data){
      $this->db->insert('user',$data);
    }

    public function ambil_data($user_id)
    {
        $this->db->where('username', $user_id);
        return $this->db->get('user')->row();
    }

    public function ambil_data_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('user')->row();
    }


    public function tampil_data()
    {
        return $this->db->get('user');
    }


    public function add($post)
    {
        $params['name']     = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address']  = $post['address'] != "" ? $post['address'] : null;
        $params['level']    = $post['level'];
        
        $this->db->insert('user', $params);
    }

    public function edit_data($where,$table){
        return $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }  

    function data_barang()
    {
        $this->db->select('*');
        $this->db->from('vbarang');
        $query = $this->db->get(); 
        return $query->result();
    }

    function totalbarang()
    {   
        $query = $this->db->query('SELECT * FROM vbarang');
        return $query->num_rows();
    }
    function barangmasuk()
    {   
        $query = $this->db->query('SELECT * FROM tbl_transaksi_masuk');
        return $query->num_rows();
    }
    function barangkeluar()
    {   
        $query = $this->db->query('SELECT * FROM tbl_transaksi_keluar where status=1');
        return $query->num_rows();
    }

    function user()
    {
        
        $query = $this->db->query("SELECT * FROM user where blokir = 'N' ");
        return $query->num_rows();
    }
}