<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('foto_pelanggan', $pelanggan['foto_pelanggan']); ?>
<?php $__env->startSection('nama_pelanggan', $pelanggan['nama_pelanggan']); ?>
<?php $__env->startSection('email_pelanggan', $pelanggan['email_pelanggan']); ?>

<?php $__env->startSection('content'); ?>
                <div class="row">
                    <link href=" <?php echo e(asset('ela/css/lib/sweetalert/sweetalert.css')); ?>" rel="stylesheet">
                    <div class="col-md-4">
                        <div class="card p-30" style="background: #f5f5f5">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <a href="<?php echo e(URL('pelanggan/reservasi')); ?>"><h2 style="color: #5e493a"><?php echo e($jumlah_kunjungan); ?></h2></a>
                                    <p class="m-b-0">Jumlah Berkunjung</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30" style="background: #f5f5f5">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <a href="<?php echo e(URL('pelanggan/pemesanan')); ?>"><h2 style="color: #5e493a"><?php echo e($pemesanan_terakhir); ?></h2></a>
                                    <p class="m-b-0">Pemesanan Terakhir</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30" style="background: #f5f5f5">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <a href="<?php echo e(URL('pelanggan/pemesanan')); ?>"><h2 style="color: #5e493a"><?php echo e($total_pemesanan); ?></h2></a>
                                    <p class="m-b-0">Total Pemesanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="<?php echo e(asset('ela/js/lib/sweetalert/sweetalert.min.js')); ?>"></script>
                <!-- scripit init-->
                <script type="text/javascript">
                    swal("Hey, <?php echo e($pelanggan['nama_pelanggan']); ?>", "Selamat datang di dashboard 8-Stars Restaurant", "success")
                </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pelanggan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>