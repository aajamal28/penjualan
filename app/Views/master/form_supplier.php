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
                <h1 class="page-header">Register Supplier</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form role="form" class="form-horizontal" action="<?= base_url('master/supplier/save') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="splId" class="col-sm-2 col-form-label text-navy text-right">ID. Supplier</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="splId" name="splId" placeholder="Supplier ID." maxlength="8" required="true" autocomplete="off" <?php if(isset($supplier)) echo "value = '".$supplier['idspl']."'" ?> <?php if(isset($supplier)) echo "readonly = 'true' "?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="splName" class="col-sm-2 col-form-label text-navy text-right">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="splName" name="splName" placeholder="Nama Supplier" required="true" autocomplete="off" <?php if(isset($supplier)) echo "value = '".$supplier['name']."'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="splAdr" class="col-sm-2 col-form-label text-navy text-right">Alamat</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="splAdr" name="splAdr" placeholder="Alamat Supplier" required="true" autocomplete="off"><?php if(isset($supplier)) echo $supplier['address']?></textarea>
                                        <!-- <input type="text" class="form-control" id="splName" name="splName" placeholder="Supplier Name" required="true" autocomplete="false"> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="splTelp" class="col-sm-2 col-form-label text-navy text-right">No. Telp</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="splTelp" name="splTelp" placeholder="No. Telp. Supplier" required="true" autocomplete="off" <?php if(isset($supplier)) echo "value = '".$supplier['telp']."'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="splDate" class="col-sm-2 col-form-label text-navy text-right">Tgl. Input</label>
                                    <div class="col-sm-3">
                                        <input type="datetime" class="form-control" id="splDate" name="splDate" <?php if(isset($supplier)) {echo "value = '".$supplier['created_at']."'";} else { echo "value ='".date('Y-m-d H:i:s')."'"; }?> required="true" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="splBy" class="col-sm-2 col-form-label text-navy text-right">User</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="splBy" name="splBy" <?php if(isset($supplier)) { echo "value = '".$supplier['created_by']."'"; } else { echo "value = 'admin'"; } ?> required="true" readonly>
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