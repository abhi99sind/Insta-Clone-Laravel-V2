<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="<?php echo e($user->profile->image()); ?>" class="rounded-corners w-100" style="border-radius : 50%;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between">
                <div class="d-flex pb-3">
                <h1><?php echo e($user->username); ?></h1>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('view', $user->profile)): ?>
                <follow-button user-id = "<?php echo e($user->id); ?>" follows="<?php echo e($follows); ?>"></follow-button>
                <?php endif; ?>
                </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view',$user->profile)): ?>
            <a href="/post/create">Add New Post</a>
            <?php endif; ?>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view',$user->profile)): ?>
            <a href="/profiles/<?php echo e($user->id); ?>/edit">Edit My Profile</a>
            <?php endif; ?>
            <div class="d-flex pl-3">
            <div class="pr-3"><strong><?php echo e($postCount); ?></strong> Posts</div>
            <div class="pr-3"><strong><?php echo e($followersCount); ?></strong> Followers</div>
            <div class="pr-3"><strong><?php echo e($followingCount); ?></strong> Following</div>
            </div>
        <div class="pt-4"><strong><?php echo e($user->profile->title); ?></strong></div>
        <div><?php echo e($user->profile->description); ?></div>
        </div>
    </div>
    <div class="row pt-4">
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4 pb-4">
        <a href="/post/<?php echo e($posts->id); ?>">
        <img src="/storage/<?php echo e($posts->img); ?>" class="w-100">

        </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecamp\resources\views/home.blade.php ENDPATH**/ ?>