<?php 
/**
 *
 */
class Mbarang extends CI_Model
{
    function data_barang()
    {
        $this->db->select('*');
        $this->db->from('vbarang');
        $query = $this->db->get(); 
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

    function getbarangbyid($id)
    {
        $query = $this->db->query("SELECT * from tbl_barang where pk_barang_id = $id");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE; 
        }
        
    }

    
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    
   
     function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

  
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }    
    


}
