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
                <h1 class="page-header">Data Penerimaan Barang</h1>
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
                        <h5 class="text-primary">Riwayat Penerimaan</a></h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tbInbound">
                                <thead>
                                    <tr>
                                        <th>No. Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Supplier</th>
                                        <th>Nomor Dokumen</th>
                                        <th>Tgl. Dokumen</th>
                                        <th>Total Barang / Nilai</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($inbound as $ib) : ?>
                                        <tr>
                                            <td><?= $ib['tr_no'] ?></td>
                                            <td><?= $ib['tr_date'] ." ". $ib['tr_time']?></td>
                                            <td><?= $ib['tr_splid'] ." - ". $ib['name'] ?></td>
                                            <td><?= $ib['tr_doc'] ?></td>
                                            <td><?= $ib['tr_docdate'] ?></td>
                                            <td><?= $ib['tr_total'] ." / ".number_format( $ib['tr_nilai'] ) ?></td>
                                            <td>
                                            <a href="<?= base_url('trans/inbound/' . $ib['tr_no'] . '/detail') ?>" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="h2">Anda Yakin?</h2>
                        <p>Data yang terhapus tidak bisa dikembalikan!!</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
        $('#tbInbound').DataTable({
            responsive: true
        });
    });
</script>
<?= $this->endSection() ?>