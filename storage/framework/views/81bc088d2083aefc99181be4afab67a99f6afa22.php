<?php $__env->startSection('title', 'Buat Pemesanan'); ?>

<?php $__env->startSection('foto_pelanggan', $pelanggan['foto_pelanggan']); ?>
<?php $__env->startSection('nama_pelanggan', $pelanggan['nama_pelanggan']); ?>
<?php $__env->startSection('email_pelanggan', $pelanggan['email_pelanggan']); ?>

<?php $__env->startSection('content'); ?>
                    <div class="card">
                            <div class="basic-form">
                                 <form method="POST" action="<?php echo e(URL('pelanggan/pemesanan/')); ?>">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <label for="id_restoran">Restoran</label>
                                        <select name="id_restoran" class="form-control">
                                            <?php $__currentLoopData = $restoran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restoran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($restoran->id_restoran); ?>"><?php echo e($restoran->nama_restoran.' - '.$restoran->alamat_restoran); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>


                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#makanan" role="tab"><span class="hidden-sm-up"><i class="ti-fire"></i></span> <span class="hidden-xs-down">Makanan</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#minuman" role="tab"><span class="hidden-sm-up"><i class="ti-fire"></i></span> <span class="hidden-xs-down">Minuman</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="makanan" role="tabpanel">
                                            <div class="row">
                                            <?php $__currentLoopData = $makanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $makanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <div class="card">
                                                  <img class="card-img-top" src="<?php echo e(asset('images/hidangan/'.$makanan->foto_hidangan)); ?>">
                                                  <div class="card-body">
                                                    <h4 class="card-title"><?php echo e($makanan->nama_hidangan); ?></h4>
                                                    <p class="card-text">Rp <?php echo e($makanan->harga_hidangan); ?></p>
                                                    <div class="row">
                                                        <input type="checkbox" class="form-control col-md-4" name="hidangan[]" value="<?php echo e($makanan->id_hidangan); ?>">
                                                        <input type="hidden" class="form-control" name="harga_hidangan<?php echo e($makanan->id_hidangan); ?>" value="<?php echo e($makanan->harga_hidangan); ?>">
                                                        <input type="text" class="form-control col-md-8" name="jumlah_hidangan<?php echo e($makanan->id_hidangan); ?>" placeholder="Jumlah">
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="minuman" role="tabpanel">
                                            <div class="row">
                                            <?php $__currentLoopData = $minuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $minuman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <div class="card">
                                                  <img class="card-img-top" src="<?php echo e(asset('images/hidangan/'.$minuman->foto_hidangan)); ?>">
                                                  <div class="card-body">
                                                    <h4 class="card-title"><?php echo e($minuman->nama_hidangan); ?></h4>
                                                    <p class="card-text">Rp <?php echo e($minuman->harga_hidangan); ?></p>
                                                    <div class="row">
                                                        <input type="checkbox" class="form-control col-md-4" name="hidangan[]" value="<?php echo e($minuman->id_hidangan); ?>">
                                                        <input type="hidden" class="form-control" name="harga_hidangan<?php echo e($minuman->id_hidangan); ?>" value="<?php echo e($minuman->harga_hidangan); ?>">
                                                        <input type="text" class="form-control col-md-8" name="jumlah_hidangan<?php echo e($minuman->id_hidangan); ?>" placeholder="Jumlah">
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-danger" href="<?php echo e(URL('pelanggan/pemesanan')); ?>">Batal</a>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pelanggan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>