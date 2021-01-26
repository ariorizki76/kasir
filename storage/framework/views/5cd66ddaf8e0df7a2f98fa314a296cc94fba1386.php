<?php $__env->startSection('title', 'Buat Reservasi'); ?>

<?php $__env->startSection('foto_pelanggan', $pelanggan['foto_pelanggan']); ?>
<?php $__env->startSection('nama_pelanggan', $pelanggan['nama_pelanggan']); ?>
<?php $__env->startSection('email_pelanggan', $pelanggan['email_pelanggan']); ?>

<?php $__env->startSection('content'); ?>
                    <?php $__currentLoopData = $reservasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-6">
                        <div class="card" style="background: #f5f5f5">
                                <div class="basic-form">
                                    <form method="POST" action="<?php echo e(URL('pelanggan/reservasi')); ?>">
                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" placeholder="<?php echo e($reservasi->nama_pelanggan); ?>" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="<?php echo e($reservasi->email_pelanggan); ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_restoran">Restoran</label>
                                            <select name="id_restoran" class="form-control">
                                                <?php $__currentLoopData = $restoran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restoran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($restoran->id_restoran); ?>"><?php echo e($restoran->nama_restoran.' - '.$restoran->alamat_restoran); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                            <a class="btn btn-danger" href="<?php echo e(URL('pelanggan/reservasi')); ?>">Batal</a>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pelanggan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>