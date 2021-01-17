<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Laporan extends CI_Controller
{
    function __construct(){
		  parent::__construct();

      if(!isset($this->session->userdata['username'])) {
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
        redirect('auth');
      }


      $this->load->library('pdf');
      $this->load->model('MLaporan');

    } 
    
    function barang_masuk()
    {

        $data['graph'] = $this->MLaporan->graph();
        $data['caribarang'] = $this->MLaporan->show_barang();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function barang_keluar()
    {

        $data['graph'] = $this->MLaporan->graph_keluar();
        $data['caribarang'] = $this->MLaporan->show_barang_keluar();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function stok_barang()
    {
        
        $data['barang'] = $this->user_m->data_barang();

		$this->load->view('templates/head/dashboard');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('master/laporan/stokbarang', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_masuk()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang($dari,$sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_keluar()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang_keluar($dari,$sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function export_pdf_masuk($dari, $sampai)
    {    
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DATA BARANG MASUK',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Tanggal',1,0);
        $pdf->Cell(85,6,'Nama Barang',1,0);
        $pdf->Cell(27,6,'Jumlah Masuk',1,0);
        $pdf->Cell(25,6,'Satuan',1,1);
        $pdf->SetFont('Arial','',10);


        $dtbarang = $this->MLaporan->data_barang($dari,$sampai);

        foreach ($dtbarang as $row){
            $pdf->Cell(20,6,$row->tanggal,1,0);
            $pdf->Cell(85,6,$row->nama_barang,1,0);
            $pdf->Cell(27,6,$row->jumlah_masuk,1,0);
            $pdf->Cell(25,6,$row->satuan_barang,1,1); 
        }
        $pdf->Output();

    }

    function export_pdf_keluar($dari, $sampai)
    {    
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DATA BARANG KELUAR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Tanggal',1,0);
        $pdf->Cell(85,6,'Nama Barang',1,0);
        $pdf->Cell(27,6,'Jumlah Keluar',1,0);
        $pdf->Cell(25,6,'Satuan',1,1);
        $pdf->SetFont('Arial','',10);


        $dtbarang = $this->MLaporan->data_barang_keluar($dari,$sampai);

        foreach ($dtbarang as $row){
            $pdf->Cell(20,6,$row->tanggal,1,0);
            $pdf->Cell(85,6,$row->nama_barang,1,0);
            $pdf->Cell(27,6,$row->jumlah_keluar,1,0);
            $pdf->Cell(25,6,$row->satuan_barang,1,1); 
        }
        $pdf->Output();

    }

}
