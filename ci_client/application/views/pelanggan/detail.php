<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Pelanggan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('pelanggan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Pelanggan
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><b>ID Pelanggan :</b><br><?= $data_pelanggan['id_pelanggan']?></h5> -->
                    <h5 class="card-text"><b>Nama :</b><br><?= $data_pelanggan['nama_pelanggan']?></h5>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_pelanggan['jenis_kelamin']?></p>
                    <p class="card-text"><b>Umur :</b><br><?= $data_pelanggan['umur']?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_pelanggan['alamat']?></p>
                    <p class="card-text"><b>No HP :</b><br><?= $data_pelanggan['notelp']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>pelanggan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>