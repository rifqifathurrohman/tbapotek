<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('obat'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
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
                        <label for="id_obat" class="col-sm-2 col-form-label">No Obat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?= set_value('id_obat'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_golongan" class="col-sm-2 col-form-label">Golongan Obat</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id_obat2" name="id_obat2" value=" <?= set_value('id_golongan'); ?>"> -->
                            <select class="form-control" id="id_golongan" name="id_golongan">
                                <option value="">--PILIH GOLONGAN OBAT--</option>
                                <?php
                                foreach ($data_golongan as $row) :
                                ?>
                                    <option value="<?= $row['id_golongan'] ?>"><?= $row['golongan_obat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_golongan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_obat" class="col-sm-2 col-form-label">nama obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value=" <?= set_value('nama_obat'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok Obat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= set_value('stok'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('stok') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">harga obat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="harga" name="harga" rows="3"><?= set_value('harga'); ?></textarea>
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