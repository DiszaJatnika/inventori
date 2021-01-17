
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<?php echo $this->session->flashdata('message_edit') ?>
	<?php echo $this->session->flashdata('message_success') ?>
	<?php echo $this->session->flashdata('message') ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			Stok Barang Telah Mencapai Batas Minimum
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
                            <td 
                                <?php 
                                    if(($jumlah <= 10) and ($jumlah > 0)){
                                        echo "class = 'bg-warning' ";
                                    }
                                    else if ($jumlah <= 0){
                                        echo "class = 'bg-danger' ";
                                    }
                                
                                ?>
                            ><?php echo $jumlah ?></td>
							<td><?php echo $row->satuan_barang ?></td>
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
            <button class="btn btn-warning"></button> Stok Minimum <br>
            <button class="btn btn-danger"></button> Stok Kosong
		</div>
	</div>
</div>

