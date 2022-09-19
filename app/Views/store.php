<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<link rel="stylesheet" href="<?= base_url('assets/sweetalert2/sweetalert2.min.css') ?>" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= APP_NAME ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">

            <?php
            foreach ($product as $prd) :
            ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="panel panel-primary">
                        <!-- <div class="panel-heading">
                            <div class="text-center text-lg">
                                <?= $prd['desc'] ?>
                            </div>
                        </div> -->
                        <div class="panel-body text-center">
                            <img class="img-thumbnail" src="<?= base_url() . "/assets/img/item/" . $prd['img'] ?>" width="150px" height="150px">
                            <hr />
                            <h4 class="card-title">
                                <a href="#"><?php echo $prd['desc']; ?></a>
                            </h4>
                            <h5> <?= "Rp. " . number_format($prd['s_price'], 0, ",", "."); ?></h5>
                            <span class="text-info"><?= $prd['specs'] ?></span>
                        </div>
                        <div class="panel-footer">

                            <a href="<?= site_url() . "product/" . $prd['id'] ?>" class="btn btn-block btn-info"><i class="glyphicon glyphicon-search"></i> Detail</a>
                            <a href="<?= site_url() . "addcart/" . $prd['id'] ?>" class="btn btn-block btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            ?>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>
<!-- DataTables JavaScript -->
<?= $this->section('jscustom') ?>
<script src="<?= base_url('assets/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 3000,
                showConfirmButton: false
            })
        <?php } ?>
    });
</script>
<?= $this->endSection() ?>