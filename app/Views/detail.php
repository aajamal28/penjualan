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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><?= $product['desc'] ?></h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-thumbnail" src="<?= base_url() . "/assets/img/item/" . $product['img'] ?>" width="250px" height="250px">
                            </div>
                            <div class="col-md-8" style="height: 250px;">
                                <h3 class="text-info">Rp. <?= number_format($product['s_price']) ?></h3>
                                <p></p>
                                <span class="font-weight-bold">Deskripsi :</span><br/>
                                <span><?= $product['specs'] ?></span>
                                <br />
                                <hr />
                                <a href="<?= site_url() . "addcart/" . $product['id'] ?>" class="btn btn-lg btn-block btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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