<?php $__env->startSection('content'); ?>
<div class="container">
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
    <div class="col-6">
    <a href="/profiles/<?php echo e($po->user->id); ?>"><img src="/storage/<?php echo e($po->img); ?>" class="w-100"></a>
    </div>
    <div class="col-4" style="border-style:groove;">
        <div>
        <div class="d-flex align-items-center">
            <div class="pr-3">
            <img src="<?php echo e($po->user->profile->image()); ?>" class="w-100" style="max-width : 60px;">
            </div>
            <div>
            <div class="font-weight-bold">
            <a href="/profiles/<?php echo e($po->user->id); ?>"><span class="text-dark"><?php echo e($po->user->username); ?></a></span>

            </div>
            </div>
            <?php if($po->canEdit($po->user_id)): ?>
            <div class="dropdown pl-5">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Post Settings
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="<?php echo e(route('post.edit', ['id' => $po->id] )); ?>" class="dropdown-item">Edit Post</a>
                <a href="/post/<?php echo e($po->id); ?>/delete" class="dropdown-item">Delete Post</a>

                </div>
            </div>
            <?php endif; ?>
        </div>
        <hr>
        <?php if($po->is_liked_by_auth_user()): ?>
            <a href="<?php echo e(route('post.unlike', ['id' => $po->id ])); ?>" class="btn btn-success btn-xs">Liked  <span class="badge"><?php echo e($po->like->count()); ?></span></a>
        <?php else: ?>
    <a href="<?php echo e(route('post.like', ['id' => $po->id ])); ?>" class="btn btn-primary btn-xs">Like <span class="badge"><?php echo e($po->like->count()); ?></span>
            </a>

        <?php endif; ?>
        <p><div class="font-weight-bold">
                <span class="text-dark"> <a href="/profiles/<?php echo e($po->user->id); ?>"><?php echo e($po->user->username); ?></a></span>
                </div><strong><?php echo e($po->caption); ?></strong></p>
        </div>
        <comment po="<?php echo e($po->toJson()); ?>" users="<?php echo e(Auth::check() ? Auth::user()->toJson() : 'null'); ?>"></comment>

    </div>
</div>
<br>
<br>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecamp\resources\views/insta.blade.php ENDPATH**/ ?>