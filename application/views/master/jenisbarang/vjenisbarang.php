 <!-- Begin Page Content -->
 <div class="container-fluid">
 	<!-- DataTales Example -->
 	<?php echo $this->session->flashdata('message_edit') ?>
 	<?php echo $this->session->flashdata('message_success') ?>
 	<?php echo $this->session->flashdata('message') ?>

 	<h1 class="h3 mb-4 text-gray-800">Data Jenis Barang</h1>
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<?php  if($this->session->userdata('level') =='admin') : ?>
 			<a href="<?php echo base_url('Jenis-barang-add')?>">
 				<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Jenis Barang</button></a>
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
 							<th>Jenis Barang</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1; if (!empty($jenisbarang)) : ?>
 						<?php foreach ($jenisbarang as $row) : ?>
 						<tr>
 							<td><?php echo $no++; ?></td>
 							<td><?php echo $row->jenis_barang ?></td>
 							<td>
 								<a href="<?=site_url('Jenis-barang-update/'.$row->pk_jenisbarang_id)?>">
 									<i class="fas fa-edit"></i>
 								</a>
 								|
 								<a href="<?=site_url('Jenis-barang-delete/'.$row->pk_jenisbarang_id)?>">
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
