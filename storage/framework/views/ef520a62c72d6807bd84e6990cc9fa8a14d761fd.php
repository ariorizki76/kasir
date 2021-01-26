<?php $__env->startSection('title', 'Rincian Pemesanan'); ?>

<?php $__env->startSection('foto_pelanggan', $pelanggan['foto_pelanggan']); ?>
<?php $__env->startSection('nama_pelanggan', $pelanggan['nama_pelanggan']); ?>
<?php $__env->startSection('email_pelanggan', $pelanggan['email_pelanggan']); ?>

<?php $__env->startSection('content'); ?>
                    <a href="<?php echo e(URL('pelanggan/pemesanan')); ?>" class="btn btn-warning">Kembali</a><a href="<?php echo e(URL('pelanggan/pemesanan/create')); ?>" class="btn btn-success">Pesan</a>

                    <div class="card" style="background: #f5f5f5">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Hidangan</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Harga Hidangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $detil_pemesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_pemesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($detil_pemesanan->nama_hidangan); ?></td>
                                            <td><?php echo e($detil_pemesanan->jenis_hidangan); ?></td>
                                            <td><?php echo e($detil_pemesanan->harga_hidangan); ?></td>
                                            <td><?php echo e($detil_pemesanan->jumlah_hidangan); ?></td>
                                            <td><?php echo e($detil_pemesanan->total_harga_hidangan); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/datatables.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')); ?>"></script>
                    <script src="<?php echo e(asset('ela/js/lib/datatables/datatables-init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pelanggan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>