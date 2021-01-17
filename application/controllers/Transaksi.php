<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Transaksi extends CI_Controller
{
    function __construct(){
		  parent::__construct();

      if(!isset($this->session->userdata['username'])) {
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
        redirect('auth');
      }
      if($this->session->userdata['username']  != 'admin') {
        redirect('dashboard');
      }

      $this->load->model('MTransaksi');

    } 
    
  function view_masuk(){

    $data['tr_masuk'] = $this->MTransaksi->transaksi_masuk();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/transaksi_masuk/transaksi_masuk', $data);
    $this->load->view('templates/footer/tabel');
  }


  function delete($id)
  {
    $where = array ('pk_transaksi_masuk_id' => $id);
    $hasil = $this->MTransaksi->hapus_data($where, 'tbl_transaksi_masuk');
    
    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
    Data Berhasil Dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>');
    
    redirect('Transaksi-masuk-view');
      
  }


  function add_view()
  {
    
    $data['barang'] = $this->MTransaksi->get_master_toobject("vbarang","pk_barang_id","kocak","nama_barang","Select","","");
        
    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/transaksi_masuk/vaddtransaksimasuk', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_data()
  { //data diri

    // print_r($barangno);
    $tanggal  = $this->input->post('tanggal');
    $idbarang  = $this->input->post('id_barang');
    $jumlahmasuk  = $this->input->post('jumlah_masuk');

    $data = array(
        'tanggal' => $tanggal,
        'id_barang' => $idbarang,
        'jumlah_masuk' => $jumlahmasuk
    );

    $this->MTransaksi->input_data($data, 'tbl_transaksi_masuk');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Transaksi-masuk-view');

  }


  // KELUARR CROTTT

  
  function view_keluar(){

    $data['tr_keluar'] = $this->MTransaksi->transaksi_keluar();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/transaksi_keluar/transaksi_keluar', $data);
    $this->load->view('templates/footer/tabel');
  }
  

  function add_keluar()
  {
    
    $data['barang'] = $this->MTransaksi->get_master_toobject("vbarang","pk_barang_id","kocak","nama_barang","Select","","");
        
    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/transaksi_keluar/vaddtransaksikeluar', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_keluar()
  {

    $tanggal  = $this->input->post('tanggal');
    $idbarang  = $this->input->post('id_barang');
    $jumlahkeluar  = $this->input->post('jumlah_keluar');

    $data = array(
        'tanggal' => $tanggal,
        'id_barang' => $idbarang,
        'jumlah_keluar' => $jumlahkeluar
    );

    $this->MTransaksi->input_data($data, 'tbl_transaksi_keluar');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Transaksi-keluar-view');

  }

  function accept($id)
  {
    
    //proses
    $this->MTransaksi->accept_data($id);

    //output
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Disetujui
        </div>');
    redirect('Transaksi-keluar-view');
  }

  function reject($id)
  {
    
    //proses
    $this->MTransaksi->reject_data($id);

    //output
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Tidak Disetujui
        </div>');
    redirect('Transaksi-keluar-view');
  }

}
