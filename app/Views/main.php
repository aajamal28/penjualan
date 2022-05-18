<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-wrench fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalBarang ?></div>
                                <div> Barang</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= site_url('master/barang') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Selengkapnya ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-home fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalSupplier ?></div>
                                <div>Supplier</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= site_url('master/supplier') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Selengkapnya ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalIb ?></div>
                                <div>Penerimaan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= site_url('trans/inbound') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Selengkapnya ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-truck fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalOb ?></div>
                                <div>Penjualan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= site_url('trans/outbound') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Selengkapnya ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>

<?= $this->section('jscustom') ?>
<?= $this->endSection() ?>