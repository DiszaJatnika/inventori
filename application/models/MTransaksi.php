<?php 
/**
 *
 */
class MTransaksi extends CI_Model
{
    function transaksi_masuk()
    {
        $query = $this->db->query("SELECT tt.*, tb.nama_barang, tb.id_barang AS nomorbarang FROM tbl_transaksi_masuk AS tt
        LEFT JOIN tbl_barang tb
        ON tt.id_barang = tb.pk_barang_id");
        return $query->result();
    }

    function transaksi_keluar()
    {
        $query = $this->db->query("SELECT tt.*, tb.nama_barang, tb.id_barang AS nomorbarang FROM tbl_transaksi_keluar AS tt
        LEFT JOIN tbl_barang tb
        ON tt.id_barang = tb.pk_barang_id");
        return $query->result();
    }



    function get_master_toobject($tablename,$value,$display,$orderby,$objtype,$defaultvalue,$condition,$columns='*',$encrypt=false) {
        $enc_value='';
        if ($condition==''){
	       $query=$this->db->query("SELECT $columns FROM ". $tablename ." order by ". $orderby);   
        }else{ 
	       $query=$this->db->query("SELECT $columns FROM ". $tablename ." where ". $condition ." order by ". $orderby);
        }
	    if($query->num_rows()>0)
	    {
            $fetch_data=$query->result();
            $data = array();  
            foreach($fetch_data as $row)  
            {                  
                if ($encrypt==false){
                    $enc_value=$row->$value;
                }else{
                    $enc_value=encrypt($row->$value);
                }
                if ($objtype=="Select"){
                    if ($defaultvalue!="" && $row->$value==$defaultvalue){                        
                        $data[] = "<option value=". $enc_value ." selected>".$row->$display."</option>";          
                    }else{
                        $data[] = "<option value=". $enc_value .">".$row->$display."</option>";      
                    }                    
                }                
            }  
            return $data;
        }
	    else
        {
            return FALSE;
        }	    	
    }

    function generatenobarang()
    {
        $query = $this->db->query("SELECT generate_barang_no() as barangid");
        return $query->result_array();
        
    }

    
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

  
    function hapus_data($where,$table){
        $aksi = $this->db->where($where);
        $aksi = $this->db->delete($table);
  
    }    


    function accept_data($id)
    {
        $accept = $this->db->query("
        UPDATE tbl_transaksi_keluar
        SET status = 1
        WHERE pk_transaksi_keluar_id = $id");
        return $accept;
        
    }

    function reject_data($id)
    {
        $reject = $this->db->query("
        UPDATE tbl_transaksi_keluar
        SET status = 2
        WHERE pk_transaksi_keluar_id = $id");
        return $reject;
        
    }
    


}
