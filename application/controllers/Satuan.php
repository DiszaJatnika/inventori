<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Satuan extends CI_Controller
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
      $this->load->model('MSatuan');

    } 
    
  function index(){

    $data['satuan'] = $this->MSatuan->data_satuan();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/satuan/vsatuan', $data);
    $this->load->view('templates/footer/tabel');
  }

  function update_view($id){

    $satuan = $this->MSatuan->getsatuanbyid($id);
    $data['satuan'] = $satuan[0];

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/satuan/veditsatuan', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_data()
  { //data diri

    // print_r($barangno);
    $satuan  = $this->input->post('satuan');

    $data = array(
        'satuan_barang' => $satuan
    );

    $this->MSatuan->input_data($data, 'tbl_satuan');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Satuan-view');

  }

  function delete($id)
  {
    $where = array ('pk_satuan_id' => $id);
    $hasil = $this->MSatuan->hapus_data($where, 'tbl_satuan');
    
    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
    Data Berhasil Dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>');
    
    redirect('Satuan-view');
      
  }

  function add_view()
  {
    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/satuan/vaddsatuan');
    $this->load->view('templates/footer/tabel');
  }

  function update_save()
  {
    $satuan_id  = $this->input->post('satuan_id');
    $satuan  = $this->input->post('satuan');

    $data = array(
        'satuan_barang' => $satuan
    );

    $where = array(
        'pk_satuan_id' => $satuan_id
    );

      $this->MSatuan->update_data($where,$data, 'tbl_satuan');
      $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">Data Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('Satuan-view');

  }


}
