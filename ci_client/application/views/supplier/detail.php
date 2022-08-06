<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Supplier</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('supplier'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Supplier
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><b>ID Supplier :</b><br><?= $data_supplier['id_supplier'] ?></h5> -->
                    <h5 class="card-text"><b>Nama :</b><br><?= $data_supplier['nama_supplier'] ?></h5>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_supplier['alamat'] ?></p>
                    <p class="card-text"><b>No HP :</b><br><?= $data_supplier['notelp'] ?></p>
                    <p class="card-text"><b>Penanggung Jawab :</b><br><?= $data_supplier['penanggungjawab'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>supplier" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>