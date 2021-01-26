<?php $__env->startSection('title', 'Profil'); ?>

<?php $__env->startSection('foto_pelanggan', $pelanggan['foto_pelanggan']); ?>
<?php $__env->startSection('nama_pelanggan', $pelanggan['nama_pelanggan']); ?>
<?php $__env->startSection('email_pelanggan', $pelanggan['email_pelanggan']); ?>

<?php $__env->startSection('content'); ?>
                    <a href="<?php echo e(URL('pelanggan/pengaturan/'.$pelanggan['id_pelanggan'].'/edit')); ?>" class="btn-primary btn">Edit Profil</a>

                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-12">
                                <div class="card" style="background: #f5f5f5">
                                    <div class="card-body">
                                        <div class="card-two">
                                            <header>
                                                <div class="avatar">
                                                    <img src="<?php echo e(asset('images/profil')); ?>/<?php echo e($pelanggan['foto_pelanggan']); ?>" />
                                                </div>
                                            </header>

                                            <h3><?php echo e($pelanggan['nama_pelanggan']); ?></h3>
                                            <div class="desc">
                                                <?php echo e($pelanggan['email_pelanggan']); ?> - <?php echo e($pelanggan['username_pelanggan']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pelanggan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>