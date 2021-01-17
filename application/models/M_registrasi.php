<?php

class M_registrasi extends CI_Model{

    public function total_jml_poli()
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

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null){
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tampil_data()
    {
        return $this->db->get('user');
    }

    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }       

    public function edit_data($where,$table){
        return $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }   

    public function detail_data($id_user = NULL){
        $query = $this->db->get_where('user', array('id_user' => $id_user))->row();
        return $query;
    }

}