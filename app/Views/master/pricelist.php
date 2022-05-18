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
                <h1 class="page-header">Data Harga Barang</h1>
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
                        <h5 class="text-primary">Daftar Harga | <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalRegPrice"><i class="fa fa-plus-circle"></i> Update Data</a></h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tbCategory">
                                <thead>
                                    <tr>
                                        <th width="10%">ID. </th>
                                        <th>Deskripsi / Specs</th>
                                        <th width="10%">Unit</th>
                                        <th>Harga Beli (Rp.)</th>
                                        <th>Harga Jual (Rp.)</th>
                                        <th>Tanggal Berlaku</th>
                                        <th>Tanggal Berkahir</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($price as $prc) : ?>
                                        <tr>
                                            <td><?= $prc['id'] ?></td>
                                            <td><?= $prc['desc'] . " / " . $prc['specs'] ?></td>
                                            <td><?= $prc['unit'] ?></td>
                                            <td class="text-right"><?= number_format($prc['p_price']) ?></td>
                                            <td class="text-right"><?= number_format($prc['s_price']) ?></td>
                                            <td><?= $prc['start'] ?>
                                            <td><?= $prc['expire'] ?></td>
                                            <td>
                                                <?php
                                                    if($prc['status'] == '0'){
                                                        echo 'Expired';
                                                    }else{
                                                        echo 'Berlaku';
                                                    }
                                                ?>
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

        <div class="modal fade" id="modalRegPrice">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Tambah Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" class="form-horizontal" action="<?= base_url('master/harga/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="plItem" class="col-sm-2 col-form-label text-navy">Pilih Item</label>
                                <div class="col-sm-7">
                                    <!-- <input type="text" class="form-control" id="category" name="category" placeholder="category" autocomplete="false" required="true"> -->
                                    <select class="form-control" id="plItem" name="plItem" required="true">
                                        <option value="">-- Pilih Item --</option>
                                        <?php foreach ($item as $itm) : ?>
                                            <option value="<?= $itm['id'] ?>"><?= $itm['id']." / ".$itm['desc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="plpprice" class="col-sm-2 col-form-label text-navy">Harga Beli</label>
                                <div class="col-sm-4">
                                    <input input type="text" step="0.01" class="form-control" id="plpprice" name="plpprice" required="true" autocomplete="off">
                                </div>
                            
                                <label for="plsprice" class="col-sm-2 col-form-label text-navy">Harga Jual</label>
                                <div class="col-sm-4">
                                    <input input type="text" class="form-control" id="plsprice" name="plsprice" required="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pldate" class="col-sm-2 col-form-label text-navy">Tgl. Input</label>
                                <div class="col-sm-3">
                                    <input type="datetime" class="form-control" id="pldate" name="pldate" value="<?= date('Y-m-d H:i:s') ?>" required="true" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="plby" class="col-sm-2 col-form-label text-navy">User</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="plby" name="plby" value="admin" required="true" readonly>
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