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
                <h1 class="page-header">Register Barang</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form role="form" class="form-horizontal" action="<?= base_url('master/barang/save') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="itemId" class="col-sm-2 col-form-label text-navy text-right">ID. Barang</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="itemId" name="itemId" placeholder="ID. Barang" required="true" autocomplete="off" <?php if (isset($item)) echo "value = '" . $item['id'] . "'" ?> <?php if (isset($item)) echo "readonly = 'true' " ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemDesc" class="col-sm-2 col-form-label text-navy text-right">Deskripsi</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="itemDesc" name="itemDesc" placeholder="Deskripsi Barang" required="true" autocomplete="off" <?php if (isset($item)) echo "value = '" . $item['desc'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemSpecs" class="col-sm-2 col-form-label text-navy text-right">Specs</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="itemSpecs" name="itemSpecs" placeholder="Spesifikasi" required="true" autocomplete="off" <?php if (isset($item)) echo "value = '" . $item['specs'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemCat" class="col-sm-2 col-form-label text-navy text-right">Kategori</label>
                                    <div class="col-sm-5">
                                        <!-- <input type="text" class="form-control" id="splTelp" name="splTelp" placeholder="No. Telp. Supplier" required="true" autocomplete="off" > -->
                                        <select class="form-control" id="itemCat" name="itemCat" required="true">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($category as $cat) : ?>
                                                <option value="<?=$cat['idcat']?>"><?=$cat['category']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemUnit" class="col-sm-2 col-form-label text-navy text-right">Unit</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="itemUnit" name="itemUnit" placeholder="Unit" required="true" autocomplete="off" <?php if (isset($item)) echo "value = '" . $item['unit'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemDate" class="col-sm-2 col-form-label text-navy text-right">Tgl. Input</label>
                                    <div class="col-sm-3">
                                        <input type="datetime" class="form-control" id="itemDate" name="itemDate" <?php if (isset($item)) {
                                                                                                                    echo "value = '" . $item['created_at'] . "'";
                                                                                                                } else {
                                                                                                                    echo "value ='" . date('Y-m-d H:i:s') . "'";
                                                                                                                } ?> required="true" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemBy" class="col-sm-2 col-form-label text-navy text-right">User</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="itemBy" name="itemBy" <?php if (isset($item)) {
                                                                                                            echo "value = '" . $item['created_by'] . "'";
                                                                                                        } else {
                                                                                                            echo "value = '" . $user . "'";
                                                                                                        } ?> required="true" readonly>
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

    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>
<!-- DataTables JavaScript -->
<?= $this->section('jscustom') ?>
<?= $this->endSection() ?>