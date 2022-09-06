<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>

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
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection() ?>
<!-- DataTables JavaScript -->
<?= $this->section('jscustom') ?>

<script>
</script>
<?= $this->endSection() ?>