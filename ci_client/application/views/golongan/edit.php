<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Golongan Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('golongan'); ?>">List Data</a></li>
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
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="id_golongan" class="col-sm-2 col-form-label">ID Golongan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_golongan" name="id_golongan" value=" <?= $data_golongan['id_golongan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_golongan') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="golongan_obat" class="col-sm-2 col-formlabel">Golongan Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="golongan_obat" name="golongan_obat" value=" <?= $data_golongan['golongan_obat']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('golongan_obat') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kegunaan" class="col-sm-2 col-formlabel">kegunaan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="kegunaan" name="kegunaan" rows="3"><?= $data_golongan['kegunaan']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('kegunaan') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rakpenyimpanan" class="col-sm-2 col-form-label">Rak Penyimpanan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="rakpenyimpanan" name="rakpenyimpanan" value="<?= $data_golongan['rakpenyimpanan']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('rakpenyimpanan') ?>
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