<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi Penjualan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaksipenjualan'); ?>">List Data</a></li>
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
                        <label for="id_t_penjualan" class="col-sm-2 col-form-label">No Transaksi Penjualan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_t_penjualan" name="id_t_penjualan" value=" <?= $data_transaksipenjualan['id_t_penjualan']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_t_penjualan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_karyawan" class="col-sm-2 col-formlabel">Nama Karyawan</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value=" <?= $data_transaksipenjualan['id_karyawan']; ?>"> -->
                            <select class="form-control" id="id_karyawan" name="id_karyawan">
                                <?php
                                foreach ($data_karyawan as $row) :
                                ?>
                                    <option value="<?= $row['id_karyawan'] ?>" <?php if ($data_transaksipenjualan['id_karyawan'] == $row['id_karyawan']) : echo "selected"; endif; ?>> <?= $row['nama_karyawan'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_karyawan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_pelanggan" class="col-sm-2 col-formlabel">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value=" <?= $data_transaksipenjualan['id_pelanggan']; ?>"> -->
                            <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                                <?php
                                foreach ($data_pelanggan as $row) :
                                ?>
                                    <option value="<?= $row['id_pelanggan'] ?>" <?php if ($data_transaksipenjualan['id_pelanggan'] == $row['id_pelanggan']) : echo "selected"; endif; ?>> <?= $row['nama_pelanggan'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_pelanggan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_obat" class="col-sm-2 col-formlabel">Nama Obat</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="id_obat" name="id_obat" value=" <?= $data_transaksipenjualan['id_obat']; ?>"> -->
                            <select class="form-control" id="id_obat" name="id_obat">
                                <?php
                                foreach ($data_obat as $row) :
                                ?>
                                    <option value="<?= $row['id_obat'] ?>" <?php if ($data_transaksipenjualan['id_obat'] == $row['id_obat']) : echo "selected"; endif; ?>> <?= $row['nama_obat'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('id_obat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-formlabel">tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value=" <?= $data_transaksipenjualan['tanggal']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-formlabel">Jumlah</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="jumlah" name="jumlah" rows="3"><?= $data_transaksipenjualan['jumlah']; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('jumlah') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_bayar" class="col-sm-2 col-form-label">Total Bayar</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= $data_transaksipenjualan['total_bayar']; ?>">
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