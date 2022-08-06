<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Apotek Sehat | Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/icon.png') ?>" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
                        <div class="col-lg-12">
                            <div class="p-5">
                            <div class="text-center">
								<h1 class="h2 text-gray-900 mb-4">REGISTRASI</h1>
							</div>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div mb-2>
                                        <!-- Menampilkan flash data (pesan saat data error)-->
                                        <?php if ($this->session->flashdata('message')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Error! <?= $this->session->flashdata('message'); ?>
                                                <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        //create form
                                        $attributes = array('method' => "post", "autocomplete" => "off");
                                        echo form_open('', $attributes);
                                        ?>
                                        <div class="form-group row">
                                            <label for="id_karyawan" class="col-sm-4 col-form-label">ID Karyawan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= set_value('id_karyawan'); ?>">
                                                <small class="text-danger">
                                                    <?php echo form_error('id_karyawan') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value=" <?= set_value('nama_karyawan'); ?>">
                                                <small class="text-danger">
                                                    <?php echo form_error('nama_karyawan') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                                                <small class="text-danger">
                                                    <?php echo form_error('alamat') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="notelp" class="col-sm-4 col-form-label">No Hp</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value('notelp'); ?>">
                                                <small class="text-danger">
                                                    <?php echo form_error('notelp') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="username" name="username" rows="3"><?= set_value('username'); ?></textarea>
                                                <small class="text-danger">
                                                    <?php echo form_error('username') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="password" name="password" rows="3"><?= set_value('password'); ?></textarea>
                                                <small class="text-danger">
                                                    <?php echo form_error('password') ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>

<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableKaryawan').DataTable();
</script>

</body>

</html>