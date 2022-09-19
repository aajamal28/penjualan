<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<link rel="stylesheet" href="<?= base_url('assets/sweetalert2/sweetalert2.min.css') ?>" />
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
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Keranjang Belanja anda!!</h5>
                    </div>
                    <form action="<?= base_url() ?>/updatecart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="text-center">
                                        <td width="2%">No</td>
                                        <td width="33%">Item</td>
                                        <td width="17%">Harga</td>
                                        <td width="8%">Qty</td>
                                        <td width="20%">Jumlah</td>
                                        <td width="10%">Hapus</td>
                                    </thead>
                                    <?php
                                    if (count($cart) > 0) :
                                        $grand_total = 0;
                                        $i = 1;
                                        foreach ($cart as $item) :
                                            $grand_total = $grand_total + $item['subtotal'];
                                    ?>
                                            <input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td class="text-right"><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                <td class="text-right"><input type="number" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
                                                <td class="text-right"><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                                <td><a href="<?= site_url() . "deletecart/" . $item['rowid']; ?>" class="btn btn-sm btn-danger alert_btn"><i class="glyphicon glyphicon-remove"></i></a></td>
                                            <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><b>Order Total: Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b></td>
                                                <td colspan="4" align="right">
                                                    <a href="<?= site_url() . "deletecart/all" ?>" class="btn btn-sm btn-danger alert_btn">Kosongkan Cart</a>
                                                    <button class='btn btn-sm btn-success' type="submit">Update Cart</button>
                                                    <a href="<?= site_url() ?>checkout" class='btn btn-sm btn-primary'>Check Out</a>
                                            </tr>
                                        <?php
                                    else :
                                        ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Keranjang anda masih kosong</td>
                                        </tr>
                                        <?php
                                    endif;
                                        ?>
                                </table>
                            </div>
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
<script src="<?= base_url('assets/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.alert_btn').on('click', function() {
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#d33',
                cancelButtonText: "Tidak"
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            })
            return false;
        });

        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 3000,
                showConfirmButton: false
            })
        <?php } ?>
    });
</script>
<?= $this->endSection() ?>