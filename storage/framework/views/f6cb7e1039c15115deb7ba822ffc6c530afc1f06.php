<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Notifications</h1>
    <br>
    <?php $__currentLoopData = $nots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <a href='<?php echo e(route('post', $notification->data['comment']['post_id'])); ?>'>
            <strong><?php echo e($notification->data['comment']['user']['username']); ?></strong> commented on your post.
            <hr>
        </a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecamp\resources\views/nots.blade.php ENDPATH**/ ?>