<?php

class M_upload extends CI_Model{

    public function relasi()
    {
        $this->db->select('*');
        $this->db->from('marchendise');
        $this->db->join('tb_berkas', 'tb_berkas.id_marchendise_berkas = marchendise.id_marchendise');
        $query = $this->db->get();
        return $query;
    } 


    function get_data_berkas_1($where,$table){
        $this->db->join('marchendise', 'marchendise.id_marchendise = tb_berkas.id_marchendise_berkas');
        return $this->db->get_where($table, $where);
    }

    function get_data_berkas_2($where,$table){
        $this->db->join('marchendise', 'marchendise.id_marchendise = tb_berkas.id_marchendise_berkas');
        return $this->db->get_where($table, $where);
    }

    function get_data_berkas_3($where,$table){
        $this->db->join('marchendise', 'marchendise.id_marchendise = tb_berkas.id_marchendise_berkas');
        return $this->db->get_where($table, $where);
    }

    function get_data_berkas_4($where,$table){
        $this->db->join('marchendise', 'marchendise.id_marchendise = tb_berkas.id_marchendise_berkas');
        return $this->db->get_where($table, $where);
    }


    public function detail_data($id_marchendise = NULL){
        $query = $this->db->get_where('tb_berkas', array('id_marchendise_berkas' => $id_marchendise))->row();
        return $query;
    }


    public function total_jml_doc()
    {
        $query = $this->db->get('tb_berkas');
        if ($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    } 

}