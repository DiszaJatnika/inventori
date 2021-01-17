<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Jenisbarang extends CI_Controller
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
      $this->load->model('MJenisbarang');

    } 
    
  function index(){

    $data['jenisbarang'] = $this->MJenisbarang->data_jenisbarang();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/jenisbarang/vjenisbarang', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_data()
  { //data diri

    // print_r($barangno);
    $jenis_barang  = $this->input->post('jenis_barang');

    $data = array(
        'jenis_barang' => $jenis_barang
    );

    $this->MJenisbarang->input_data($data, 'tbl_jenisbarang');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Jenis-barang-view');

  }

  function delete($id)
  {
    $where = array ('pk_jenisbarang_id' => $id);
    $hasil = $this->MJenisbarang->hapus_data($where, 'tbl_jenisbarang');
    
    // if($hasil == true){
      $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
      Data Berhasil Dihapus
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>');
    // }
    
    redirect('Jenis-barang-view');
      
  }

  function add_view()
  {
    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/jenisbarang/vaddjenisbarang');
    $this->load->view('templates/footer/tabel');

  }

  function update_view($id)
  {
    
    $jenisbarang = $this->MJenisbarang->getjenisbarangbyid($id);
    $data['jenisbarang'] = $jenisbarang[0];

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/jenisbarang/veditjenisbarang', $data);
    $this->load->view('templates/footer/tabel');
  }

  function update_save()
  {
    $jenis_barang_id  = $this->input->post('jenis_barang_id');
    $jenis_barang  = $this->input->post('jenis_barang');

    $data = array(
        'jenis_barang' => $jenis_barang
    );

    $where = array(
        'pk_jenisbarang_id' => $jenis_barang_id
    );

      $this->MJenisbarang->update_data($where,$data, 'tbl_jenisbarang');
      $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">Data Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('Jenis-barang-view');
  }


}
