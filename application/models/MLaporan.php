<?php 
/**
 *
 */
class MLaporan extends CI_Model
{
   function graph()
   {
    $data = $this->db->query("SELECT tanggal,MONTH(tanggal) AS bulan, SUM(jumlah_masuk) AS jumlah_masuk FROM tbl_transaksi_masuk GROUP BY bulan");
    return $data->result();
   }
   function graph_keluar()
   {
    $data = $this->db->query("SELECT tanggal,MONTH(tanggal) AS bulan, SUM(jumlah_keluar) AS jumlah_keluar FROM tbl_transaksi_keluar where status=1 GROUP BY bulan");
    return $data->result();
   }

   function show_barang()
   {
      $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_masuk a left join vbarang b on a.id_barang = b.pk_barang_id");
      return $barang->result();
   }

   
   function show_barang_keluar()
   {
      $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_keluar a left join vbarang b on a.id_barang = b.pk_barang_id where status =1");
      return $barang->result();
   }

   
   function data_barang($dari, $sampai)
   {  
      if($dari == '' && $sampai == ''){
         $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_masuk a left join vbarang b on a.id_barang = b.pk_barang_id");
      }else
      {

         $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_masuk a left join vbarang b on a.id_barang = b.pk_barang_id
         WHERE tanggal >= '$dari' AND tanggal <= '$sampai' ");
      }
      return $barang->result();

   }
   
   function data_barang_keluar($dari, $sampai)
   {  
      if($dari == '' && $sampai == ''){
         $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_keluar a left join vbarang b on a.id_barang = b.pk_barang_id
          WHERE STATUS=1");
      }else
      {

         $barang = $this->db->query("SELECT a.*, b.nama_barang,b.satuan_barang FROM tbl_transaksi_keluar a left join vbarang b on a.id_barang = b.pk_barang_id
         WHERE tanggal >= '$dari' AND tanggal <= '$sampai' and status=1 ");
      }
      return $barang->result();

   }

}
