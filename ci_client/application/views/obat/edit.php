<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('obat'); ?>">List Data</a></li>
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
                        <label for="id_obat" class="col-sm-2 col-form-label">No Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_obat" name="id_obat" value=" <?= $data_obat['id_obat']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_obat" class="col-sm-2 col-formlabel">Golongan Obat</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id_golongan" name="id_golongan" value=" <?= $data_obat['id_golongan']; ?>"> -->
                            <select class="form-control" id="id_golongan" name="id_golongan">
                                <?php
                                foreach ($data_golongan as $row) :
                                ?>
                                    <option value="<?= $row['id_golongan'] ?>" <?php if ($data_obat['id_golongan'] == $row['id_golongan']) : echo "selected"; endif; ?>> <?= $row['golongan_obat'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_golongan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value=" <?= $data_obat['nama_obat']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok" value=" <?= $data_obat['stok']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('stok') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value=" <?= $data_obat['harga']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('harga') ?>
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