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
                <h1 class="page-header">Laporan Penerimaan Barang</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="text-primary">Mutasi Penerimaan Barang</h5>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group row">
                                <!-- <label for="rpdate" class="col-sm-2 col-form-label text-navy text-right">Unit</label> -->
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="rpdate1" name="rpdate1" placeholder="Dari tanggal" required="true" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="rpdate2" name="rpdate2" placeholder="sampai tanggal" required="true" autocomplete="off">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-search"></i> Tampilkan</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tbCategory">
                                <thead>
                                    <tr>
                                        <th>No. Transaksi </th>
                                        <th>Tanggal</th>
                                        <th>Pengirim</th>
                                        <th>Dokumen / Tanggal</th>
                                        <th>Kode Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Unit</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //print_r($ibreport);
                                    foreach ($ibreport as $ireport) :
                                    ?>
                                        <tr>
                                            <td><?= $ireport['tr_no'] ?></td>
                                            <td><?= $ireport['tr_date'] . " " . $ireport['tr_time'] ?></td>
                                            <td><?= $ireport['tr_splid'] . " - " . $ireport['name'] ?></td>
                                            <td><?= $ireport['tr_doc'] . " / " . $ireport['tr_docdate'] ?></td>
                                            <td><?= $ireport['trd_item'] ?></td>
                                            <td><?= $ireport['desc'] . " / " . $ireport['specs'] ?></td>
                                            <td class="text-right"><?= number_format($ireport['trd_qty']) ?></td>
                                            <td><?= $ireport['unit'] ?></td>
                                            <td class="text-right"><?= number_format($ireport['trd_price']) ?></td>
                                            <td class="text-right"><?= number_format($ireport['trd_total']) ?></td>
                                            <td><?= $ireport['tr_remark'] ?></td>
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
        $('#tbCategory').DataTable();
    });
</script>
<?= $this->endSection() ?>