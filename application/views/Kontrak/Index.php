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

				<!-- Admin Start -->
				<div class="row">
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body bg-success has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0"><?= $total_kontrak; ?></h3>
									<span class="text-uppercase font-size-xs">total kontrak</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-folder-open icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Admin End -->

				<!-- Users content -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Daftar <?= $title; ?></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-12">
						<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal_add"><i class="icon-plus3"></i> Tambah Data</button>
					</div>

					<div class="row m-1 mt-2">
						<div class="col-lg-12">
							<?= $this->session->flashdata('notif'); ?>
						</div>					
					</div>			

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th width="50px">#</th>
								<th>Nama Pegawai</th>
								<th>Jangka Waktu</th>
								<th>Tanggal Kontrak</th>
								<th class="text-center" width="150px">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $decode = json_decode($kontrak, TRUE); ?>
							<?php $i=1; foreach ($decode as $key): ?>
								<tr>
									<td><?= $i++  ?></td>
									<td><?= $key['pegawai_nama']  ?></td>
									<td><?= $key['kontrak_masa_kerja']  ?></td>
									<td><?= date('d M Y', strtotime($key['kontrak_tgl'])) ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#modal_update_<?= $key['kontrak_id'] ?>"><i class="icon-pencil"></i></button>
										<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal_delete_<?= $key['kontrak_id'] ?>"><i class="icon-trash"></i></button>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
					</div>
				</div>
				<!-- /Users content -->

			</div>
			<!-- /content area -->

			<div id="modal_add" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title">Tambah <?= $title; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Kontrak/save" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Masukkan Pegawai :</label>
									<select class="form-control select-search" name="Pegawai">
										<?php foreach ($pegawai as $add_pegawai): ?>
											<option value="<?= $add_pegawai->pegawai_id ?>"><?= $add_pegawai->pegawai_nama ?> - <?= $add_pegawai->pegawai_nip ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label>Masukkan Masa Kerja :</label>
									<select class="form-control select-search" name="Masa_Kerja">
										<option value="1 Bulan">1 Bulan</option>
										<option value="3 Bulan">3 Bulan</option>
										<option value="6 Bulan">6 Bulan</option>
										<option value="1 Tahun">1 Tahun</option>
										<option value="2 Tahun">2 Tahun</option>
										<option value="3 Tahun">3 Tahun</option>
									</select>
								</div>
								<div class="form-group">
									<label>Masukkan Tanggal Kontrak :</label>
									<input type="date" class="form-control" placeholder="Masukkan Tanggal Kontrak" name="Tanggal_Kontrak" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-primary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-primary">Tambah Data</button>
							</div>
						</form>
						</div>
					</div>
				</div>

			<?php foreach ($decode as $update): ?>
				<div id="modal_update_<?= $update['kontrak_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Update <?= $title; ?> <?= $update['pegawai_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Kontrak/update/<?= $update['kontrak_id'] ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Masukkan Pegawai :</label>
									<select class="form-control select-search" name="Pegawai" readonly disabled>
										<?php foreach ($pegawai as $add_pegawai): ?>
											<option value="<?= $add_pegawai->pegawai_id ?>" <?php if($update['pegawai_id'] == $add_pegawai->pegawai_id) { echo "selected";} ?>><?= $add_pegawai->pegawai_nama ?> - <?= $add_pegawai->pegawai_nip ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label>Masukkan Masa Kerja :</label>
									<select class="form-control select-search" name="Masa_Kerja">
										<option value="1 Bulan" <?php if($update['kontrak_masa_kerja'] == "1 Bulan") { echo "selected";} ?>>1 Bulan</option>
										<option value="3 Bulan" <?php if($update['kontrak_masa_kerja'] == "3 Bulan") { echo "selected";} ?>>3 Bulan</option>
										<option value="6 Bulan" <?php if($update['kontrak_masa_kerja'] == "6 Bulan") { echo "selected";} ?>>6 Bulan</option>
										<option value="1 Tahun" <?php if($update['kontrak_masa_kerja'] == "1 Tahun") { echo "selected";} ?>>1 Tahun</option>
										<option value="2 Tahun" <?php if($update['kontrak_masa_kerja'] == "2 Tahun") { echo "selected";} ?>>2 Tahun</option>
										<option value="3 Tahun" <?php if($update['kontrak_masa_kerja'] == "3 Tahun") { echo "selected";} ?>>3 Tahun</option>
									</select>
								</div>
								<div class="form-group">
									<label>Masukkan Tanggal Kontrak :</label>
									<input type="date" class="form-control" placeholder="Masukkan Tanggal Kontrak" name="Tanggal_Kontrak" value="<?= $update['kontrak_tgl'] ?>" required readonly disabled oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Update Data</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			<?php endforeach ?>

			<?php foreach ($decode as $delete): ?>
				<div id="modal_delete_<?= $delete['kontrak_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $delete['pegawai_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Kontrak/Delete/<?= $delete['kontrak_id']; ?>" method="post">
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
			<?php endforeach ?>