<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pelanggan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('pelanggan'); ?>">List Data</a></li>
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
                        <label for="id_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value=" <?= $data_pelanggan['id_pelanggan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_pelanggan') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-2 col-formlabel">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value=" <?= $data_pelanggan['nama_pelanggan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_pelanggan') ?>
                            </small>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis
                                Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" <?php if ($data_pelanggan['jenis_kelamin'] == "Laki-laki") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin2" name="jenis_kelamin" value="Perempuan" <?php if ($data_pelanggan['jenis_kelamin'] == "Perempuan") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('jenis_kelamin') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="umur" class="col-sm-2 col-formlabel">Umur</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="umur" name="umur" rows="3"><?= $data_pelanggan['umur']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('umur') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-formlabel">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data_pelanggan['alamat']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="notelp" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $data_pelanggan['notelp']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('notelp') ?>
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