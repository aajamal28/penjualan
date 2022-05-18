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
        <div class="row" id="nonPrint">
            <div class="col-lg-12">
                <h1 class="page-header">Transaksi <?= $trid ?></h1>
                
                <button class="btn btn-primary" id="btnPrint" onclick="printDiv()"><i class="fa fa-print"> </i> Print</button>
                <hr/>
            </div>
            <!-- /.col-lg-12 --> 
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="text-primary">Detail Transaksi</a></h5>
                    </div>
                    <div class="panel-body">
                        <dl class="row">
                            <dd class="col-sm-2">Nomor Transaksi</dt>
                            <dt class="col-sm-10"><?= $trans['tr_no'] ?></dd>
                            <dd class="col-sm-2">Tanggal</dt>
                            <dt class="col-sm-10"><?= $trans['tr_date'] . " " . $trans['tr_time'] ?></dd>
                            <dd class="col-sm-2">Pelanggan</dt>
                            <dt class="col-sm-10"><?= $trans['tr_cust'] ?></dd>
                            <dd class="col-sm-2">Keterangan</dt>
                            <dt class="col-sm-10"><?= $trans['tr_remark'] ?></dd>
                        </dl>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tbInbound">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan (Rp.)</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sum = 0;
                                    foreach ($detail as $dt) :
                                        $gt = $dt['trd_price'] * $dt['trd_qty'];
                                    ?>
                                        <tr>
                                            <td><?= $dt['trd_line'] ?></td>
                                            <td><?= $dt['trd_item'] ?></td>
                                            <td><?= $dt['desc'] . " / " . $dt['specs'] ?></td>
                                            <td class="text-right"><?= $dt['trd_qty'] . " " . $dt['unit'] ?></td>
                                            <td class="text-right"><?= number_format($dt['trd_price'], 2) ?></td>
                                            <td class="text-right"><?= number_format($dt['trd_price'] * $dt['trd_qty'], 2) ?></td>
                                        </tr>
                                    <?php
                                        $sum = $sum + $gt;
                                    endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total</td>
                                        <td class="text-right">Rp. <?= number_format($sum) ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="5" class="text-right">Bayar</td>
                                        <td class="text-right">Rp. <?= number_format($sum) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Kembali</td>
                                        <td class="text-right">Rp. <?= number_format($sum) ?></td>
                                    </tr> -->
                                </tfoot>
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
    function printDiv(divName) {
        const nonPrint = document.getElementById('nonPrint');
        nonPrint.style.display = "none";
        window.print();

        nonPrint.style.display = "block";
    }
</script>
<?= $this->endSection() ?>