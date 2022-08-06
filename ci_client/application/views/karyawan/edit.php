<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Karyawan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('karyawan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="id_karyawan" class="col-sm-2 col-form-label">ID Karyawan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value=" <?= $data_karyawan['id_karyawan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_karyawan') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_karyawan" class="col-sm-2 col-formlabel">Nama Karyawan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value=" <?= $data_karyawan['nama_karyawan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_karyawan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-formlabel">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data_karyawan['alamat']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="notelp" class="col-sm-2 col-form-label">No
                            Hp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $data_karyawan['notelp']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('notelp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-formlabel">Username</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="username" name="username" rows="3"><?= $data_karyawan['username']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('username') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-formlabel">Password</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="password" name="password" rows="3"><?= $data_karyawan['password']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('password') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
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