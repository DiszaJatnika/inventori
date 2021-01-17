 <!-- Begin Page Content -->
 <div class="container-fluid">
 	<!-- DataTales Example -->
 	<?php echo $this->session->flashdata('message_edit') ?>
 	<?php echo $this->session->flashdata('message_success') ?>
 	<?php echo $this->session->flashdata('message') ?>

 	<h1 class="h3 mb-4 text-gray-800">Data Transaksi Masuk</h1>
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<?php  if($this->session->userdata('level') =='admin') : ?>
 			<a href="<?php echo base_url('Transaksi-masuk-add')?>">
 				<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Transaksi Masuk</button></a>
 			<?php
              endif;
              ?>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th>No</th>
 							<th>Tanggal</th>
 							<th>No Barang</th>
 							<th>Nama Barang</th>
 							<th>Jumlah Masuk</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1; if (!empty($tr_masuk)) : ?>
 						<?php foreach ($tr_masuk as $row) : ?>
 						<tr>
 							<td><?php echo $no++; ?></td>
 							<td><?php echo $row->tanggal ?></td>
 							<td><?php echo $row->nomorbarang ?></td>
 							<td><?php echo $row->nama_barang ?></td>
 							<td><?php echo $row->jumlah_masuk ?></td>
 							<td>
 								<a href="<?=site_url('Transaksi-masuk-delete/'.$row->pk_transaksi_masuk_id)?>">
 									<i class="fas fa-trash"></i>
 								</a>
 							</td>
 						</tr>
 						<?php endforeach ?>
 						<?php else: ?>
 						<tr>
 							<td colspan="9" align="center">Tidak Ada Data</td>
 						</tr>
 						<?php endif ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>

 </div>
 <!-- /.container-fluid -->
 </div>
