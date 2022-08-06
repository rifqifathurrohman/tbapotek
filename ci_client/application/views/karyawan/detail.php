<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Karyawan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('karyawan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Karyawan
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><b>ID Karyawan :</b><br><?= $data_karyawan['id_karyawan'] ?></h5> -->
                    <h5 class="card-text"><b>Nama Karyawan :</b><br><?= $data_karyawan['nama_karyawan'] ?></h5>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_karyawan['alamat'] ?></p>
                    <p class="card-text"><b>No HP :</b><br><?= $data_karyawan['notelp'] ?></p>
                    <p class="card-text"><b>Username :</b><br><?= $data_karyawan['username'] ?></p>
                    <p class="card-text"><b>Password :</b><br><?= $data_karyawan['password'] ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>