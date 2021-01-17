<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//main
$route['dashboard'] = "Dashboard";
$route['User'] = "User";

//barang
$route['Barang-view'] = "Barang";
$route['Barang-add'] = "Barang/add_view";
$route['Barang-save'] = "Barang/save_data";
$route['Barang-update/(:any)'] = "Barang/ubah_data/$1";
$route['Barang-update'] = "Barang/update";
$route['Barang-delete/(:any)'] = "Barang/delete/$1";

//Jenis Barang
$route['Jenis-barang-view'] = "Jenisbarang";
$route['Jenis-barang-add'] = "Jenisbarang/add_view";
$route['Jenis-barang-save'] = "Jenisbarang/save_data";
$route['Jenis-barang-delete/(:any)'] = "Jenisbarang/delete/$1";
$route['Jenis-barang-update/(:any)'] = "Jenisbarang/update_view/$1";
$route['Jenis-barang-update-save'] = "Jenisbarang/update_save";

//Satuan

$route['Satuan-view'] = "Satuan";
$route['Satuan-delete/(:any)'] = "Satuan/delete/$1";
$route['Satuan-add'] = "Satuan/add_view";
$route['Satuan-update/(:any)'] = "Satuan/update_view/$1";
$route['Satuan-save'] = "Satuan/save_data";
$route['Satuan-update'] = "Satuan/update_save";


//Transaksi masuk

$route['Transaksi-masuk-view'] = "Transaksi/view_masuk";
$route['Transaksi-masuk-add'] = "Transaksi/add_view";
$route['Transaksi-masuk-save'] = "Transaksi/save_data";
$route['Transaksi-masuk-delete/(:any)'] = "Transaksi/delete/$1";

//Transaksi keluar

$route['Transaksi-keluar-view'] = "Transaksi/view_keluar";
$route['Transaksi-keluar-add'] = "Transaksi/add_keluar";
$route['Transaksi-keluar-save'] = "Transaksi/save_keluar";
//action

$route['Transaksi-keluar-accept/(:any)'] = "Transaksi/accept/$1";
$route['Transaksi-keluar-reject/(:any)'] = "Transaksi/reject/$1";


//laporan
$route['Laporan-barang-masuk'] = "Laporan/barang_masuk";
$route['Laporan-barang-keluar'] = "Laporan/barang_keluar";
$route['Laporan-stok-barang'] = "Laporan/stok_barang";
$route['Laporan-masuk-cari'] = "Laporan/laporan_masuk";
$route['Laporan-masuk-cari-keluar'] = "Laporan/laporan_keluar";
$route['Export-pdf-laporan-masuk/(:any)/(:any)'] = "Laporan/export_pdf_masuk/$1/$2";
$route['Export-pdf-laporan-keluar/(:any)/(:any)'] = "Laporan/export_pdf_keluar/$1/$2";
