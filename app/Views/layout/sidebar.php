<?php
    $session = session();
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search text-center">
                <!-- <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div> -->
                 <!-- input-group -->
                 <img class="img img-thumbnail imgLogo" src="<?= base_url('assets/img/webapp.png') ?>" alt="Apps Logo" width="100px" height="150px">
            </li>
            <li>
                <a href="<?= base_url('/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-database fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= site_url('master/kategori') ?>">Kategori</a>
                    </li>
                    <!-- <li>
                        <a href="#">Unit</a>
                    </li> -->
                    <li>
                        <a href="<?= site_url('master/supplier') ?>">Supplier</a>
                    </li>
                    <li>
                        <a href="<?= site_url('master/barang') ?>">Barang</a>
                    </li>
                    <?php if( $session->get('role') == 'AD' ) : ?>
                    <li>
                        <a href="<?= site_url('master/harga') ?>">List Harga</a>
                    </li>
                    <li>
                        <a href="<?= site_url('master/user') ?>">User</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> Penerimaan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= site_url('trans/inbound/add') ?>"> <i class="fa fa-plus"></i> Buat Transaksi</a>
                    </li>
                    <li>
                        <a href="<?= site_url('trans/inbound/') ?>"><i class="fa fa-file-o"></i> List Penerimaan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-truck"></i> Penjualan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= site_url('trans/outbound/add') ?>"> <i class="fa fa-plus"></i> Buat Transaksi</a>
                    </li>
                    <li>
                        <a href="<?= site_url('trans/outbound/') ?>"><i class="fa fa-file-o"></i> List Penjualan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-file fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= site_url('report/stock') ?>">Stock</a>
                    </li>
                    <li>
                        <a href="<?= site_url('report/penerimaan') ?>">Penerimaan</a>
                    </li>
                    <li>
                        <a href="<?= site_url('report/penjualan') ?>">Penjualan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>