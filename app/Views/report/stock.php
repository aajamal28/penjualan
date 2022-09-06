<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>

<!-- DataTables CSS -->
<link href="<?= base_url('assets/css/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url('assets/css//dataTables/dataTables.responsive.css') ?>" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Stock Barang</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <?php if (!empty(session()->getFlashdata('success'))) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Success!</h5><?= session()->getFlashdata('success'); ?>
                    </div>
                <?php } ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="text-primary">Daftar Stock</h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tbCategory">
                                <thead>
                                    <tr>
                                        <th width="10%">ID. </th>
                                        <th>Deskripsi / Specs</th>
                                        <th width="10%">Unit</th>
                                        <th>Jumlah Stock</th>
                                        <th>Total Nilai</th>
                                        <th>Transaksi Terkahir</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($stock as $stk) : ?>
                                        <tr>
                                            <td><?= $stk['id'] ?></td>
                                            <td><?= $stk['desc'] . " / " . $stk['specs'] ?></td>
                                            <td><?= $stk['unit'] ?></td>
                                            <td class="text-right"><?= number_format($stk['stock']) ?></td>
                                            <td class="text-right"><?= "Rp. ".number_format($stk['stock']*$stk['p_price'], 2, ",", ".") ?></td>
                                            <td><?= $stk['date'] ?>
                                            
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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
<script src="<?= base_url('assets/js/dataTables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables/dataTables.bootstrap.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#tbCategory').DataTable({
            responsive: true
        });
    });
</script>
<?= $this->endSection() ?>