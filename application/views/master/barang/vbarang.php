 <!-- Begin Page Content -->
 <div class="container-fluid">
 	<!-- DataTales Example -->
 	<?php echo $this->session->flashdata('message_edit') ?>
 	<?php echo $this->session->flashdata('message_success') ?>
 	<?php echo $this->session->flashdata('message') ?>

 	<h1 class="h3 mb-4 text-gray-800">Data Barang</h1>
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<?php  if($this->session->userdata('level') =='admin') : ?>
 			<a href="<?php echo base_url('Barang-add')?>">
 				<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Barang</button></a>
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
 							<th>ID Barang</th>
 							<th>Nama Barang</th>
 							<th>Jenis Barang</th>
 							<th>Stok</th>
 							<th>Satuan</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1; if (!empty($barang)) : ?>
						 <?php foreach ($barang as $row) : 
								$stok = $row->stokbarang;
								$keluar = $row->keluar;
								$jumlah = $stok-$keluar;
							?>
 						<tr>
 							<td><?php echo $no++; ?></td>
 							<td><?php echo $row->id_barang ?></td>
 							<td><?php echo $row->nama_barang ?></td>
 							<td><?php echo $row->jenis_barang ?></td>
 							<td><?php echo $jumlah ?></td>
 							<td><?php echo $row->satuan_barang ?></td>
 							<td>
 								<a href="<?=site_url('Barang-update/'.$row->pk_barang_id)?>">
 									<i class="fas fa-edit"></i>
 								</a>
 								|
 								<a href="<?=site_url('Barang-delete/'.$row->pk_barang_id)?>">
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
