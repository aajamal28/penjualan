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
                <h1 class="page-header">Register User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form role="form" class="form-horizontal" action="<?= base_url('master/user/save') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="usrid" class="col-sm-2 col-form-label text-navy text-right">ID.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="usrid" name="usrid" maxlength="8" autocomplete="off" readonly value="<?php if(isset($user)){echo $user['usrid']; }else{ echo uniqid(); } ?>" required="true" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrlogin" class="col-sm-2 col-form-label text-navy text-right">User Login</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrlogin" name="usrlogin" placeholder="Username login" required="true" autocomplete="off" <?php if (isset($user)) echo "value = '" . $user['username'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrname" class="col-sm-2 col-form-label text-navy text-right">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Nama Supplier" required="true" autocomplete="off" <?php if (isset($user)) echo "value = '" . $user['name'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrpwd" class="col-sm-2 col-form-label text-navy text-right">Password</label>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="usrpwd" name="usrpwd" placeholder="Password" required="true" autocomplete="off" <?php if (isset($user)) echo "value = '" . $user['password'] . "'" ?>>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="usrpwdconf" name="usrpwdconf" placeholder="Ulangi Password" required="true" autocomplete="off" <?php if (isset($user)) echo "value = '" . $user['password'] . "'" ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrrole" class="col-sm-2 col-form-label text-navy text-right">Akses</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="usrrole" id="usrrole" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="AD">Admin</option>
                                            <option value="OP">Operator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrdate" class="col-sm-2 col-form-label text-navy text-right">Tgl. Input</label>
                                    <div class="col-sm-3">
                                        <input type="datetime" class="form-control" id="usrdate" name="usrdate" <?php if (isset($user)) {
                                                                                                                    echo "value = '" . $user['created_at'] . "'";
                                                                                                                } else {
                                                                                                                    echo "value ='" . date('Y-m-d H:i:s') . "'";
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