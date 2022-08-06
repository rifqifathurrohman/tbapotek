<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi Supplier</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaksisupplier'); ?>">List Data</a></li>
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
                        <label for="id_t_supplier" class="col-sm-2 col-form-label">No Transaksi Supplier</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_t_supplier" name="id_t_supplier" value="<?= set_value('id_t_supplier'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_t_supplier') ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="id_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-5">
                            <!-- <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?= set_value('id_obat'); ?>"> -->
                            <select class="form-control" id="id_obat" name="id_obat">
                                <option value="">--PILIH OBAT--</option>
                                <?php
                                foreach ($data_obat as $row) :
                                ?>
                                    <option value="<?= $row['id_obat'] ?>"><?= $row['nama_obat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                        <div class="col-sm-5">
                            <!-- <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= set_value('id_supplier'); ?>"> -->
                            <select class="form-control" id="id_supplier" name="id_supplier">
                                <option value="">--PILIH SUPPLIER--</option>
                                <?php
                                foreach ($data_supplier as $row) :
                                ?>
                                    <option value="<?= $row['id_supplier'] ?>"><?= $row['nama_supplier'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_supplier') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-5">
                            <!-- <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= set_value('id_karyawan'); ?>"> -->
                            <select class="form-control" id="id_karyawan" name="id_karyawan">
                                <option value="">--PILIH KARYAWAN--</option>
                                <?php
                                foreach ($data_karyawan as $row) :
                                ?>
                                    <option value="<?= $row['id_karyawan'] ?>"><?= $row['nama_karyawan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_karyawan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value=" <?= set_value('tanggal'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="jumlah" name="jumlah" rows="3"><?= set_value('jumlah'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('jumlah') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_bayar" class="col-sm-2 col-form-label">Total Bayar</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= set_value('total_bayar'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('total_bayar') ?>
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