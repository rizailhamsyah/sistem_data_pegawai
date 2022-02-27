<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body bg-primary">
						<div class="card-body text-center">
							<a href="#">
								<img src="<?= base_url(); ?>global_assets/images/placeholders/user.png" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">Riza Ilhamsyah</h6>
							<span class="font-size-sm text-white text-shadow-dark">rizailhamsyah021@gmail.com</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Pengaturan Akun</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?= base_url(); ?>Auth/logout" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="<?= base_url('Pegawai') ?>" class="nav-link <?php if($title == "Data Pegawai"){echo "active";} ?>">
								<i class="icon-user-tie"></i>
								<span>
									Data Pegawai
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Kontrak') ?>" class="nav-link <?php if($title == "Data Kontrak"){echo "active";} ?>">
								<i class="icon-folder-open"></i>
								<span>
									Data Kontrak
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Jabatan') ?>" class="nav-link <?php if($title == "Data Jabatan"){echo "active";} ?>">
								<i class="icon-bookmark4"></i>
								<span>
									Data Jabatan
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
				<!-- Main content -->
		<div class="content-wrapper">