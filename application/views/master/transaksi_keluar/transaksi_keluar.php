 <!-- Begin Page Content -->
 <div class="container-fluid">
 	<!-- DataTales Example -->
 	<?php echo $this->session->flashdata('message_edit') ?>
 	<?php echo $this->session->flashdata('message_success') ?>
 	<?php echo $this->session->flashdata('message') ?>

 	<h1 class="h3 mb-4 text-gray-800">Data Transaksi Keluar</h1>
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<?php  if($this->session->userdata('level') =='admin') : ?>
 			<a href="<?php echo base_url('Transaksi-keluar-add')?>">
 				<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i> Tambah Transaksi Keluar</button></a>
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
 							<th>Jumlah Keluar</th>
 							<th>Status</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1; if (!empty($tr_keluar)) : ?>
                         <?php foreach ($tr_keluar as $row) : 
                            $stt = $row->status;    
                        ?>
 						<tr>
 							<td><?php echo $no++; ?></td>
 							<td><?php echo $row->tanggal ?></td>
 							<td><?php echo $row->nomorbarang ?></td>
 							<td><?php echo $row->nama_barang ?></td>
 							<td><?php echo $row->jumlah_keluar?></td>
                             <td><?php 
                             
                                if($stt <= 0){
                                    echo "Pending";
                                }else if($stt == 1){
                                    echo "Accept";
                                }else if($stt == 2){
                                    echo "Reject";
                                }
                             ?></td>
 							<td>
                             <?php if ($stt <= 0) : ?>
                             <a href="<?=site_url('Transaksi-keluar-accept/'.$row->pk_transaksi_keluar_id)?>" class="btn btn-success btn-circle" title="Accept">
 									<i class="fas fa-check" ></i>
 								</a>
                                 <a href="<?=site_url('Transaksi-keluar-reject/'.$row->pk_transaksi_keluar_id)?>" class="btn btn-warning btn-circle" title="Reject">
 									<i class="fas fa-times"></i>
 								</a>
 								<a href="<?=site_url('Transaksi-keluar-delete/'.$row->pk_transaksi_keluar_id)?>" class="btn btn-danger btn-circle" title="Delete">
 									<i class="fas fa-trash"></i>
 								</a>
 							</td>
                             <?php 
                             else:
                                ?>
                                
 								<a href="<?=site_url('Transaksi-keluar-add')?>" class="btn btn-primary btn-circle" title="Add">
 									<i class="fas fa-plus"></i>
 								</a>
                                <?php
                             endif ?>
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
