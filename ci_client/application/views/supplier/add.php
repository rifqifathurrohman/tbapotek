<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Supplier</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('supplier'); ?>">List Data</a></li>
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
                        <label for="id_supplier" class="col-sm-2 col-form-label">ID Supplier</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= set_value('id_supplier'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_supplier') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value=" <?= set_value('nama_supplier'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_supplier') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="notelp" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value('notelp'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('notelp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penanggungjawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="penanggungjawab" name="penanggungjawab" rows="3"><?= set_value('penanggungjawab'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('penanggungjawab') ?>
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