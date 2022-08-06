<div class="container pt-5">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pelanggan</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <body class="bg-gradient-primary">

                            <div class="container">

                                <!-- Outer Row -->
                                <center>
                                    <div class="row col-md-10">
                                        <div class="col-md-10 col-lg-10 col-md-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    //create form
                                                    $attributes = array('method' => "post", "autocomplete" => "off");
                                                    echo form_open('', $attributes);
                                                    ?>
                                                    <div class="form-group row">
                                                        <label for="id_karyawan" class="col-sm-2 col-form-label">ID Karyawan</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= set_value('id_karyawan'); ?>">
                                                            <small class="text-danger">
                                                                <?php echo form_error('id_karyawan') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value=" <?= set_value('nama_karyawan'); ?>">
                                                            <small class="text-danger">
                                                                <?php echo form_error('nama_karyawan') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                                                            <small class="text-danger">
                                                                <?php echo form_error('alamat') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="notelp" class="col-sm-2 col-form-label">No Hp</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value('notelp'); ?>">
                                                            <small class="text-danger">
                                                                <?php echo form_error('notelp') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="username" name="username" rows="3"><?= set_value('username'); ?></textarea>
                                                            <small class="text-danger">
                                                                <?php echo form_error('username') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="password" name="password" rows="3"><?= set_value('password'); ?></textarea>
                                                            <small class="text-danger">
                                                                <?php echo form_error('password') ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10 offset-md-2">
                                                            <button type="submit" class="btn btn-primary btn-block" name="registrasi">
                                                                Sumbit
                                                            </button>
                                                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tablePelanggan').DataTable();
</script>