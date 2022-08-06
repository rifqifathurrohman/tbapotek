<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Golongan Obat</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('golongan'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Golongan Obat
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title"><b>id Golongan :</b><br><?= $data_golongan['id_golongan']?></h5> -->
                    <h5 class="card-text"><b>Golongan Obat :</b><br><?= $data_golongan['golongan_obat']?></h5>
                    <p class="card-text"><b>Kegunaan :</b><br><?= $data_golongan['kegunaan']?></p>
                    <p class="card-text"><b>Rak Penyimpanan :</b><br><?= $data_golongan['rakpenyimpanan']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>golongan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>