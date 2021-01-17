<?php 
/**
 *
 */
class M_vability extends CI_Model
{
    public function total_jml_vability()
    {
        $query = $this->db->get('vability');
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
      $this->db->insert('vability',$data);
    }

    public function tampil_data()
    {
        return $this->db->get('vability');
    }

    public function tampil_dataid($id)
    {
        $query=$this->db->query("SELECT * from vability WHERE id_vability='$id'");
        return $query->result();
    }

    public function cari_data($data_kode){
    $this->db->where($data_kode);
    $hasil=$this->db->get('vability')->result();
    return $hasil;
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
}
