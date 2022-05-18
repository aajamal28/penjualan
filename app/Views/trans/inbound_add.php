<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <h3 class="page-header">Transaksi Penerimaan</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="text-info"><i class="fa fa-barcode"></i> Input Barang</h5>
                        <hr>
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="trditem" class="col-sm-1 col-form-label text-navy text-right">Barang</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control text-right" id="trdno" name="trdno" required="true" autocomplete="off" value="1" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control select2" id="trditem" name="trditem" required="true">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($item as $itm) : ?>
                                            <option value="<?= $itm['id'] ?>"><?= $itm['desc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="trddesc" name="trddesc" required="true" autocomplete="off" readonly>
                                </div>
                                <label for="trdprice" class="col-sm-1 col-form-label text-navy text-right">Harga</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control text-right" id="trdprice" name="trdprice" placeholder="0.00" required="true" autocomplete="off" readonly>
                                </div>


                            </div>
                            <div class="form-group row">
                                <label for="trdqty" class="col-sm-1 col-form-label text-navy text-right">Jumlah</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="trdqty" name="trdqty" required="true" autocomplete="off">
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="trdunit" name="trdunit" required="true" autocomplete="off" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-md btn-info" id="btn_simpan">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-md-12">
                <div class="panel panel-success">
                    <!-- <div class="panel-heading">
                        <h3 class="text-primary"><i class="fa fa-cart-plus"></i> Transaksi Penerimaan</h>
                    </div> -->
                    <form role="form" class="form-horizontal" action="<?= base_url('trans/inbound/preview') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="trno" class="col-sm-1 col-form-label text-navy text-right">Nomor.</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="trtype" name="trtype" value="IB" required="true" autocomplete="off" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="trno" name="trno" value="<?= $trno ?>" required="true" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trdate" class="col-sm-1 col-form-label text-navy text-right">Tanggal</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="trdate" name="trdate" value="<?= date('Y-m-d') ?>" required="true" autocomplete="off">
                                </div>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" id="trtime" name="trtime" value="<?= date('H:i:s') ?>" required="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trspl" class="col-sm-1 col-form-label text-navy text-right">Supplier</label>
                                <div class="col-sm-5">
                                    <!-- <input type="text" class="form-control" id="splTelp" name="splTelp" placeholder="No. Telp. Supplier" required="true" autocomplete="off" > -->
                                    <select class="form-control select2" id="trspl" name="trspl" required="true">
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($supplier as $spl) : ?>
                                            <option value="<?= $spl['idspl'] ?>"><?= $spl['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trdoc" class="col-sm-1 col-form-label text-navy text-right">No. Dokumen</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="trdoc" name="trdoc" placeholder="Nomor dokumen" required="true" autocomplete="off">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="trdocdate" name="trdocdate" value="<?= date('Y-m-d') ?>" required="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trremark" class="col-sm-1 col-form-label text-navy text-right">Keterangan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="trremark" name="trremark" placeholder="Keterangan" required="true" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trnilai" class="col-sm-1 col-form-label text-navy text-right">Total Nilai</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control text-right" id="trnilai" name="trnilai" required="true" value=0 readonly autocomplete="off">
                                </div>
                            </div>
                            <hr>

                            <table class="table table-striped table-hover" id="tbInbound1">
                                <thead>
                                    <tr>
                                        <td width="5%">No.</td>
                                        <td>Kode Barang</td>
                                        <td>Deskripsi</td>
                                        <td width="10%">Jumlah</td>
                                        <td width="5%">Unit</td>
                                        <td width="15%">Harga</td>
                                        <td>Total</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
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
<script src="<?= base_url('assets/js/dataTables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables/dataTables.bootstrap.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script>
    $(".select2").select2();
    $(document).ready(function() {
        $('#tbInbound').DataTable({
            responsive: true
        });

        $('#trditem').change(function() {
            var item = $('#trditem').val();
            $.ajax({
                type: "GET",
                url: `<?php echo base_url('master/harga/item/') ?>/${item}`,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (data == null) {
                        alert(`Harga barang ${item} belum dibuat!!`);
                    } else {
                        console.log(data.p_price);
                        $('#trdprice').val(data.p_price.toLocaleString('id-ID'));
                        $('#trdunit').val(data.unit);
                        $('#trddesc').val(data.desc);
                    }
                }
            });
        });

        $('#btn_simpan').on('click', function() {
            var no = $('#trdno').val();
            var item = $('#trditem').val();
            var price = $('#trdprice').val();
            var qty = $('#trdqty').val();
            var unit = $('#trdunit').val();
            var desc = $('#trddesc').val();
            var nilai = parseInt($('#trnilai').val());
            console.log(`nilainya adalah ${nilai}`);
            var subtotal = price * qty;

            var html = html_code = "<tr id='row" + no + "'>";
            html += "<td><input type='text' class='form-control' id='trdno1' name='trdno[]' required='on' value='" + no + "'></td>";
            html += "<td><input type='text' class='form-control' id='trditem1' name='trditem1[]' required='on' value='" + item + "'></td>";
            html += "<td><input type='text' class='form-control' id='trddesc1' name='trddesc1[]' required='on' value='" + desc + "'></td>";
            html += "<td><input type='number' class='form-control text-right' id='trdqty1' name='trdqty1[]' required='on' value='" + qty + "'></td>";
            html += "<td><input type='text' class='form-control' id='trdunit1' name='trdunit1[]' required='on' value='" + unit + "'></td>";
            html += "<td><input type='text' class='form-control text-right' id='trdprice1' name='trdprice1[]' required='on' value='" + price + "'></td>";
            html += "<td><input type='text' class='form-control text-right' id='trdextend1' name='trdextend1[]' required='on' value='" + subtotal + "'></td>";
            html += "<td><button type='button' name='remove' data-row='row" + no + "' class='btn btn-danger btn-sm remove'><i class='fa fa-trash'></i></button>"
            html += "</tr>";
            $('#tbInbound1').append(html);
            no++;
            var nilai2 = nilai + subtotal;
            $('#trdno').val('');
            $('#trdno').val(no);
            $('#trditem').val('0');
            $('#trdprice').val('');
            $('#trdqty').val('');
            $('#trdunit').val('');
            $('#trddesc').val('');
            $('#trnilai').val('');
            $('#trnilai').val(nilai2);
            //console.log(html);
            return false;
        });

        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
    });
</script>
<?= $this->endSection() ?>