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
                <h1 class="page-header">Data <i class="fa fa-angle-double-right"></i> Kategori</h1>
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
                        <h5 class="text-primary">Daftar Kategori | <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalRegCat"><i class="fa fa-plus-circle"></i> Tambah Data</a></h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tbCategory">
                                <thead>
                                    <tr>
                                        <th width="10%">ID. </th>
                                        <th width="45%">Kategory</th>
                                        <th width="35%">URL</th>
                                        <th width="15%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($category as $ctg) :
                                    ?>
                                        <tr>
                                            <td><?= $ctg['idcat'] ?></td>
                                            <td><?= $ctg['category'] ?></td>
                                            <td><?= $ctg['slug'] ?></td>
                                            <td><a href="#" data-href="<?= base_url('master/kategori/' . $ctg['idcat'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="modalRegCat">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Tambah Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" class="form-horizontal" action="<?= base_url('master/kategori/save') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label text-navy">Category</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="category" name="category" placeholder="category" autocomplete="false" required="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="catdate" class="col-sm-2 col-form-label text-navy">Tgl. Input</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="catdate" name="catdate" value="<?= date('Y-m-d') ?>" required="true" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="catby" class="col-sm-2 col-form-label text-navy">User</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="catby" name="catby" value="<?= $user ?>" required="true" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="h2">Anda Yakin?</h2>
                    <p>Data yang terha[pus tidak bisa dikembalikan!!</p>
                </div>
                <div class="modal-footer">
                    <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

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

    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>