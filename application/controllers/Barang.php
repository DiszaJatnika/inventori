<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Barang extends CI_Controller
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
      
      $this->load->model('Mbarang');

    } 
    
  function index(){

    $data['barang'] = $this->Mbarang->data_barang();
    

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/barang/vbarang', $data);
    $this->load->view('templates/footer/tabel');
  }
  
  function add_view()
  {
      $data['jenisbarang']  = $this->Mbarang->get_master_toobject("tbl_jenisbarang","pk_jenisbarang_id","jenis_barang","jenis_barang","Select","","");
      $data['satuan']  = $this->Mbarang->get_master_toobject("tbl_satuan","pk_satuan_id","satuan_barang","satuan_barang","Select","","");

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/barang/vaddbarang', $data);
    $this->load->view('templates/footer/tabel');
  }

  function save_data()
  { //data diri
    $barangno = $this->Mbarang->generatenobarang();

    // print_r($barangno);
    $nama  = $this->input->post('nama_barang');
    $jenis  = $this->input->post('jenis_barang');
    $satuan  = $this->input->post('satuan');
    $barang = "B".$barangno[0]['barangid'];

    $data = array(
        'id_barang' => $barang,
        'nama_barang' => $nama,
        'fk_jenisbarang_id' => $jenis,
        'fk_satuan_id' => $satuan
    );

    $this->Mbarang->input_data($data, 'tbl_barang');
    $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Data Berhasil Ditambahkan
        </div>');
    redirect('Barang-view');

  }

  function delete($id)
  {
    $where = array ('pk_barang_id' => $id);
    $this->Mbarang->hapus_data($where, 'tbl_barang');
    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        Data Berhasil Dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('Barang-view');
  }


  function ubah_data($id)
  {
    $databarang = $this->Mbarang->getbarangbyid($id);
    $data['barang'] = $databarang[0];
    $data['jenisbarang']  = $this->Mbarang->get_master_toobject("tbl_jenisbarang","pk_jenisbarang_id","jenis_barang","jenis_barang","Select","","");
    $data['satuan']  = $this->Mbarang->get_master_toobject("tbl_satuan","pk_satuan_id","satuan_barang","satuan_barang","Select","","");

    $this->load->view('templates/head/tabel');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('master/barang/veditbarang', $data);
    $this->load->view('templates/footer/tabel');
  }

  function update()
  {
    // print_r($barangno);
    $nama  = $this->input->post('nama_barang');
    $jenis  = $this->input->post('jenis_barang');
    $satuan  = $this->input->post('satuan');
    $barang_id  = $this->input->post('barang_id');

    $data = array(
        'nama_barang' => $nama,
        'fk_jenisbarang_id' => $jenis,
        'fk_satuan_id' => $satuan
    );

    $where = array(
        'pk_barang_id' => $barang_id
    );

      $this->Mbarang->update_data($where,$data, 'tbl_barang');
      $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">Data Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('Barang-view');

  }
}
