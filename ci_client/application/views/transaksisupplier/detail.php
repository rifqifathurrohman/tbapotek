<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi Supplier</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaksisupplier'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Transaksi Supplier
                </div>
                <div class="card-body">
                    <h5 class="card-text"><b>Tanggal :</b><br><?= $data_transaksisupplier['tanggal'] ?></h5>
                    <p class="card-text"><b>Nama Karyawan :</b><br><?= $data_transaksisupplier['nama_karyawan'] ?></p>
                    <p class="card-text"><b>Nama Supplier :</b><br><?= $data_transaksisupplier['nama_supplier'] ?></p>
                    <p class="card-text"><b>Penangung Jawab :</b><br><?= $data_transaksisupplier['penanggungjawab'] ?></p>
                    <p class="card-text"><b>Nama Obat :</b><br><?= $data_transaksisupplier['nama_obat'] ?></p>
                    <p class="card-text"><b>Jumlah :</b><br><?= $data_transaksisupplier['jumlah'] ?></p>
                    <p class="card-text"><b>Total Bayar :</b><br><?= $data_transaksisupplier['total_bayar'] ?></p>
                    <a href="<?= base_url(); ?>transaksisupplier" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>