<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Transaksi Penjualan</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('Transaksipenjualan/add') ?>">Tambah Data</a>
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="tableTransaksipenjualan">
                            <thead>
                                <tr class="table-primary">
                                    <th>TANGGAL</th>
                                    <th>NAMA PELANGGAN</th>
                                    <th>NAMA_OBAT</th>
                                    <th>HARGA</th>
                                    <th>JUMLAH</th>
                                    <th>TOTAL BAYAR</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_transaksipenjualan as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['nama_pelanggan'] ?></td>
                                        <td><?= $row['nama_obat'] ?></td>
                                        <td><?= $row['harga'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['total_bayar'] ?></td>
                                        <td>
                                            <a href="<?= base_url('Transaksipenjualan/detail/'.$row['id_t_penjualan']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('Transaksipenjualan/edit/'.$row['id_t_penjualan']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('Transaksipenjualan/delete/'.$row['id_t_penjualan']) ?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableTransaksipenjualan').DataTable();
</script>