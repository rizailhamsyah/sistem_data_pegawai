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

				<!-- add data content -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><?= $title; ?></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

			<form action="<?= base_url(); ?>Pegawai/save" method="post" enctype="multipart/form-data">		
				<div class="row m-2">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan NIP :</label>
							<input type="text" class="form-control" placeholder="Masukkan NIP" name="NIP" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Photo (Opsional) :</label>
							<input type="file" class="form-control" placeholder="Photo" name="Photo">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Nama :</label>
							<input type="text" class="form-control" placeholder="Masukkan Nama" name="Nama" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Jabatan :</label>
							<select name="Jabatan" class="form-control">
								<?php foreach ($jabatan as $key): ?>
									<option value="<?= $key->jabatan_id ?>"><?= $key->jabatan_nama ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label class="d-block mb-3">Masukkan Jenis Kelamin :</label>
							<input type="radio" value="L" name="JK" checked> Laki-laki
							<input type="radio" value="P" name="JK"> Perempuan
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Tempat Lahir :</label>
							<input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="Tempat_Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Tanggal Lahir :</label>
							<input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" name="Tanggal_Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Agama :</label>
							<select name="Agama" class="form-control">
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Budha">Budha</option>
								<option value="Hindu">Hindu</option>
								<option value="Konghucu">Konghucu</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Email :</label>
							<input type="email" class="form-control" placeholder="Email" name="Email" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan No. Handphone :</label>
							<input type="text" class="form-control" placeholder="Masukkan No. Handphone" name="No_HP" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Tanggal Masuk :</label>
							<input type="date" class="form-control" placeholder="Masukkan Tanggal Masuk" name="Tanggal_Masuk" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					
				</div>
				<div class="row mb-3 ml-2 mr-2">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
					</div>
				</div>
			</form>
				</div>
				<!-- /basic responsive configuration -->
					</div>
				</div>
				<!-- /add data content -->

			</div>
			<!-- /content area -->