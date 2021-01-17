<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/') ?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<!-- <img class="img-profile" src="<?=base_url()?>assets/img/AXIS_XL.jpg" width="80" height="50"> -->
				</div>
				<div class="sidebar-brand-text mx-3">Inventori Gudang</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?=base_url()?>dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Beranda</span></a>
			</li>
			<?php 
			
			$level = $this->session->userdata['level'];

			if($level == 'admin') :
			
			?>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu Utama
			</div>

			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
					aria-controls="collapseOne">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Master</span>
				</a>
				<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('Barang-view')?>">Data Barang</a>
						<a class="collapse-item" href="<?php echo base_url('Jenis-barang-view')?>">Jenis Barang</a>
						<a class="collapse-item" href="<?php echo base_url('Satuan-view')?>">Satuan</a>
					</div>
				</div>
			</li>
      <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Transaksi</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('Transaksi-masuk-view')?>">Barang Masuk</a>
						<a class="collapse-item" href="<?php echo base_url('Transaksi-keluar-view')?>">Barang Keluar</a>
					</div>
				</div>
			</li>
		<?php endif ?>
      <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
					aria-controls="collapseThree">
					<i class="fas fa-fw fa-cog"></i>
					<span>Laporan</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('Laporan-stok-barang')?>">Stok Barang</a>
						<a class="collapse-item" href="<?php echo base_url('Laporan-barang-masuk')?>">Barang Masuk</a>
						<a class="collapse-item" href="<?php echo base_url('Laporan-barang-keluar')?>">Barang Keluar</a>
					</div>
				</div>
			</li>
<?php 
	if($level == 'admin') :
?>

			<div class="sidebar-heading">
				Lainnya
			</div>

      <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
					aria-controls="collapseFour">
					<i class="fas fa-fw fa-cog"></i>
					<span>Pengaturan</span>
				</a>
				<div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url('User') ?>">Manajemen User</a>
						<a class="collapse-item" href="cards.html">Ubah Password</a>
					</div>
				</div>
			</li>
		
<?php 
	endif
?>
			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>auth/logout">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->
