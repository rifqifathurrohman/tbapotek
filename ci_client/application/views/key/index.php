<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Key</a></li>
            <li class="breadcrumb-item active" aria-current="page">Generated Key</li>
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
            <div class="card border-primary mb-3">
                <div class="card-body" align="center">
                    <h4>Membuat Generated Key</h4>
                    <h5>Klik Refresh untuk membuat Generated Key unik</h5>
                    <br>
                </div>
                <div class="d-grid gap-4 col-2 mx-auto">
                <button class="btn btn-primary" type="button" value="Refresh Page" onClick="document.location.reload(true)"> <i class="fa fa-refresh"></i> Refresh</button>
                </div>
                <br>
            </div>

            
            <h5>Silahkan Pilih simpan Untuk Membuat Generated Key</h5>
            <div class="card-body">
                <?php
                //create form
                $attributes = array('method' => "post", "autocomplete" => "off");
                echo form_open('', $attributes);
                ?>

                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID KEY</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="id" name="id" value="<?= mt_rand(0, 99) ?>" maxlength="2" readonly>
                        <small class="text-danger">
                            <?php echo form_error('id') ?>
                        </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="key" class="col-sm-2 col-form-label">GENEATED KEY</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="key" name="key" value="KEY<?= mt_rand(100, 999) ?>" maxlength="8" readonly>
                        <small class="text-danger">
                            <?php echo form_error('key') ?>
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
</div>