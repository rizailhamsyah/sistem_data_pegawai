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

				<!-- Jabatan Start -->
				<div class="row">
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body bg-danger has-bg-image">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-0"><?= $total_jabatan; ?></h3>
									<span class="text-uppercase font-size-xs">total jabatan</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-bookmark4 icon-3x opacity-75"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Jabatan End -->

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
								<th>Nama Jabatan</th>
								<th width="150px" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $decode = json_decode($jabatan, TRUE); ?>
							<?php $i=1; foreach ($decode as $key): ?>
							<?php $cek_jabatan = $this->db->get_where('tbl_pegawai', ['jabatan_id' => $key['jabatan_id']])->num_rows(); ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $key['jabatan_nama'] ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#modal_update_<?= $key['jabatan_id'] ?>"><i class="icon-pencil"></i></button>
										<?php if ($cek_jabatan ==0): ?>
										<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal_delete_<?= $key['jabatan_id'] ?>"><i class="icon-trash"></i></button>
										<?php endif ?>
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
						<form action="<?= base_url(); ?>Jabatan/save" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Masukkan Jabatan :</label>
									<input type="text" class="form-control" placeholder="Jabatan" name="Jabatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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
				<div id="modal_update_<?= $update['jabatan_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Update <?= $title; ?> <?= $update['jabatan_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Jabatan/update/<?= $update['jabatan_id'] ?>" method="post">
							<div class="modal-body">

									<div class="form-group">
										<label>Masukkan Jabatan :</label>
										<input type="text" class="form-control" placeholder="Jabatan" name="Jabatan" value="<?= $update['jabatan_nama']; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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
				<?php $cek_jabatan1 = $this->db->get_where('tbl_pegawai', ['jabatan_id' => $delete['jabatan_id']])->num_rows(); ?>
				<?php if ($cek_jabatan1 == 0): ?>
				<div id="modal_delete_<?= $delete['jabatan_id']; ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $delete['jabatan_nama']; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<form action="<?= base_url(); ?>Jabatan/Delete/<?= $delete['jabatan_id']; ?>" method="post">
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