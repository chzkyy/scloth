<?php $__env->startSection('title'); ?>
    SCloth
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    <?php echo e($item->category->category); ?>

                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1> <?php echo e($item->name); ?> </h1>
                            <img src="<?php echo e(url($item->image)); ?>" class="rounded mx-auto d-block">
                            <h2>Deskripsi Pakaian</h3>
                            <?php echo e($item->detail->description); ?>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h3>Sold: 30 Item(s)</h3>
                            <h4>Price: Rp. <?php echo e($item->price); ?></h4>
                            <button class="btn btn-success" type="submit">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliahhhhhh\LEC Web Programming\scloth-main\resources\views/pages/detail.blade.php ENDPATH**/ ?>