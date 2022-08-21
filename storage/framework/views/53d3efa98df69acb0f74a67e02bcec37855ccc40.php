
<?php $__env->startSection('content'); ?>
    <div class = "container">
        <h2>Products</h2>
        <a href="<?php echo e(url('/product/create')); ?>" class="btn btn-sucess btn-sm">Add Product</a>    <br>
        <?php if(auth()->guard()->check()): ?>
        <span class="font-bold uppercase">WELCOME <?php echo e(auth()->user()->name); ?></span>
        <br>
        <form action="/logout" class="inline" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Log Out</button>
        </form>
        <?php else: ?>
        <a href="/register">Register</a>
        <a href="/login">LogIn</a>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->description); ?></td>
                    <td><?php echo e($item->price); ?></td>
                    <td>
                        <a href="/product/<?php echo e($item->id); ?>/edit">Edit</a>
                        <form action="/product/<?php echo e($item->id); ?>" method="POST">
                            <?php echo csrf_field(); ?> <!-- this is used so that other site can not submit their information ro our site. cross site protection-->
                            <?php echo method_field('DELETE'); ?>
                            <button typen = "submit" class = "btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\productCrud\resources\views/product/index.blade.php ENDPATH**/ ?>