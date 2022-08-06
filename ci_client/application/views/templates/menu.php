<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Rest Client - PEMROGRAMAN III</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('key'); ?>">Generate Key</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('obat'); ?>">Obat</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('golongan'); ?>">Golongan Obat</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('karyawan'); ?>">Karyawan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('pelanggan'); ?>">Pelanggan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('supplier'); ?>">Supplier</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('transaksipenjualan'); ?>">Transaksi Penjualan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('transaksisupplier'); ?>">Transaksi Supplier</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('login/logout');  ?>">Logout</a>
            </li>
        </ul>
        <!-- <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('penjualan2'); ?>">Penjualan</a>
            </li>
        </ul> -->
    </div>
</nav>