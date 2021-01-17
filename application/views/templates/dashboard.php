<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<p>
			Selamat Datang <strong><?php echo $this->session->userdata['username']; ?></strong> di Aplikasi Inventory
			Gudang Toko <i> Dunia
				Percetakan</i>
		</p>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Data Barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalbarang ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-folder fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Transaksi Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barangmasuk ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Transaksi Keluar</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barangkeluar ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								User</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->

</div>


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
							<td><?php echo $jumlah ?></td>
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
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->


</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo base_url('auth/logout')?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url()?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
