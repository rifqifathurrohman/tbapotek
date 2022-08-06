<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi Penjualan</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('transaksipenjualan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Transaksi Penjualan
                </div>
                <div class="card-body">
                    <h5 class="card-text"><b>Tanggal :</b><br><?= $data_transaksipenjualan['tanggal']?></h5>
                    <p class="card-title"><b>Nama Karyawan :</b><br><?= $data_transaksipenjualan['nama_karyawan']?></p>
                    <p class="card-title"><b>Nama Pelanggan :</b><br><?= $data_transaksipenjualan['nama_pelanggan']?></p>
                    <p class="card-text"><b>Umur :</b><br><?= $data_transaksipenjualan['umur']?></p>
                    <p class="card-text"><b>Nama Obat :</b><br><?= $data_transaksipenjualan['nama_obat']?></p>
                    <p class="card-text"><b>Harga :</b><br><?= $data_transaksipenjualan['harga']?></p>
                    <p class="card-text"><b>Jumlah :</b><br><?= $data_transaksipenjualan['jumlah']?></p>
                    <p class="card-text"><b>Total Bayar :</b><br><?= $data_transaksipenjualan['total_bayar']?></p>
                    <a href="<?= base_url(); ?>transaksipenjualan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>