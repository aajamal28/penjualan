<?php
$session = session();
?>
<div class="navbar-header">
    <a class="navbar-brand" href=""><?= APP_NAME ?></a>
</div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<!-- <ul class="nav navbar-nav navbar-left navbar-top-links">
    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
</ul> -->

<ul class="nav navbar-right navbar-top-links">
    <li class="dropdown navbar-inverse">
        <a class="dropdown-toggle" data-toggle="dropdown" href="<?= site_url('keranjang') ?>">
            <i class="fa fa-shopping-cart fa-fw"></i> Keranjang<b class="caret"></b>
            <span class="badge badge-success"><?= $cartTotal ?></span>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="<?= site_url('keranjang') ?>">
                    <div>
                        <i class="fa fa-shopping-cart fa-fw"></i> Total Barang
                        <span class="pull-right text-muted small"><?= $cartTotal ?></span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>Cek Keranjang</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </li>
    <?php if ($session->get('logged_in') === TRUE) : ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php
                                                    $session = session();
                                                    echo $session->get('name');
                                                    ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= site_url('auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
</ul>

<!-- /.navbar-top-links -->