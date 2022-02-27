		<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
							<span class="breadcrumb-item active"><?= $title; ?></span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->
			<!-- Content area -->
			<div class="content">

				<!-- Pegawai Start -->
				<div class="row">
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body bg-primary has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0"><?= $total_pegawai; ?></h3>
									<span class="text-uppercase font-size-xs">total pegawai</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-user-tie icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Pegawai End -->

				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-12">
						<a href="<?= base_url(); ?>Pegawai/add" class="btn btn-primary btn-sm btn-block"><i class="icon-plus3"></i> Tambah Data</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12">
						<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#modal_import"><i class="icon-plus3"></i> Import Data</button>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 mt-2">
						<?= $this->session->flashdata('notif'); ?>					
					</div>
				</div>		

				<div class="row">
					
					<?php $decode = json_decode($pegawai, TRUE); ?>
					<?php foreach ($decode as $key): ?>
					<?php $cek_pegawai = $this->db->get_where('tbl_kontrak', ['pegawai_id' => $key['pegawai_id']])->num_rows(); ?>
					<div class="col-xl-4 col-sm-6 col-lg-12">
						<div class="card">
							<div class="card-img-actions">
								<img class="card-img-top img-fluid" src="<?= base_url(); ?>global_assets/images/Profile/<?= $key['pegawai_photo']; ?>" alt="">
								<div class="card-img-actions-overlay card-img-top">
									<button type="button" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-3" data-toggle="modal" data-target="#modal_show_<?= $key['pegawai_id'] ?>" title="Show Data">
										<i class="icon-eye"></i>
									</button>
									<a href="<?= base_url(); ?>Pegawai/change/<?= $key['pegawai_id']; ?>" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-3" title="Update Data">
										<i class="icon-pencil"></i>
									</a>
									<?php if ($cek_pegawai == 0): ?>
									<button type="button" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-3" data-toggle="modal" data-target="#modal_delete_<?= $key['pegawai_id'] ?>" title="Delete Data">
										<i class="icon-trash"></i>
									</button>
									<?php endif ?>
								</div>
							</div>

					    	<div class="card-body text-center">
					    		<h6 class="font-weight-semibold mb-0"><?= $key['pegawai_nama']; ?></h6>
					    		<span class="d-block text-muted"><?= $key['jabatan_nama']; ?></span>
					    	</div>
				    	</div>
					</div>
					<?php endforeach ?>
				</div>
				<div class="row">
					<div class="mx-auto">
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
			<!-- /content area -->

			<div id="modal_import" class="modal fade" tabindex="-1">
			    <div class="modal-dialog modal-md">
			        <div class="modal-content">
			            <div class="modal-header bg-success">
			                <h5 class="modal-title">Import <?= $title; ?></h5>
			                <button type="button" class="close" data-dismiss="modal">&times;</button>
			            </div>
			            <form action="<?= base_url(); ?>Pegawai/import" method="post" enctype="multipart/form-data">
			                <div class="modal-body">
			                    <div>
			                        <b>Petunjuk Upload File</b>
			                        <br>1. Download Format nya <a href="<?= base_url(); ?>assets/excel/Format_Import_Data_Pegawai.csv">disini</a>
			                        <br>2. File Harus berupa file xls/xlsx
			                        <br>3. Ukuran File Tidak Boleh Melebihi 2mb
			                        <br>4. Dilarang mengubah isi format yang sudah ditetapkan
			                        <br>5. Hanya boleh mengisi bagian tabel yang sudah disediakan
			                        <br>6. Upload File Dibawah
			                        <br>7. Klik Upload
			                    </div>
			                    <br><br>
			                    <div class="form-group">
			                        <label>Upload File:</label>
			                        <input type="file" name="csv">
			                        <span class="form-text text-muted">Accepted formats: csv. Max file size 2Mb</span>
			                    </div>


			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
			                    <button type="submit" class="btn bg-success">Import Data</button>
			                </div>
			            </form>
			        </div>
			    </div>
			</div>

			<?php foreach ($decode as $show): ?>
				<div id="modal_show_<?= $show['pegawai_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title">Detail <?= $title; ?> <?= $show['pegawai_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<div class="modal-body">
							<div class="row mb-3">
								<div class="col-lg-12">
									<img src="<?= base_url(); ?>global_assets/images/Profile/<?= $show['pegawai_photo'] ?>" width="100px" height="100px" class="rounded-circle d-flex mx-auto">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">NIP</div>
								<div class="col-lg-7"><?= $show['pegawai_nip'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Nama</div>
								<div class="col-lg-7"><?= $show['pegawai_nama'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Jenis Kelamin</div>
								<div class="col-lg-7"><?= $show['pegawai_jk'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Tempat Lahir</div>
								<div class="col-lg-7"><?= $show['pegawai_tpt_lahir'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Tanggal Lahir</div>
								<div class="col-lg-7"><?= date('d M Y', strtotime($show['pegawai_tgl_lahir'])) ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Agama</div>
								<div class="col-lg-7"><?= $show['pegawai_agama'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Jabatan</div>
								<div class="col-lg-7"><?= $show['jabatan_nama'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">No. Handphone</div>
								<div class="col-lg-7"><?= $show['pegawai_no_hp'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Email</div>
								<div class="col-lg-7"><?= $show['pegawai_email'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-5">Tanggal Masuk</div>
								<div class="col-lg-7"><?= date('d M Y', strtotime($show['pegawai_tgl_masuk'])) ?></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-link text-primary" data-dismiss="modal">Close</button>
						</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>

			<?php foreach ($decode as $delete): ?>
				<?php $cek_pegawai1 = $this->db->get_where('tbl_kontrak', ['pegawai_id' => $delete['pegawai_id']])->num_rows(); ?>
				<?php if ($cek_pegawai1 == 0): ?>
				<div id="modal_delete_<?= $delete['pegawai_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $delete['pegawai_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Pegawai/Delete/<?= $delete['pegawai_id']; ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-danger">Hapus Data</button>
							</div>
						</form>
						</div>
					</div>
				</div>
				<?php endif ?>
			<?php endforeach ?>