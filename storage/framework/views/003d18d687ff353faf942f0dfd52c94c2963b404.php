<?php $__env->startSection('content'); ?>
<div class="container">
<form action="/profiles/<?php echo e($user->id); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit My Profile</h1>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Title</label>
                        <input id="title"
                        type="text"
                        name="title"
                        class="form-control
                        <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="title"
                        value="<?php echo e(old('title') ?? $user->profile->title); ?>"
                        required autocomplete="title" autofocus>
                        <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label ">Description</label>
                            <input id="description"
                            type="text"
                            name="description"
                            class="form-control
                            <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="description"
                            value="<?php echo e(old('description') ?? $user->profile->description); ?>"
                            required autocomplete="description" autofocus>
                            <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label ">Url</label>
                            <input id="url"
                            type="text"
                            name="url"
                            class="form-control
                            <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="url"
                            value="<?php echo e(old('url') ?? $user->profile->url); ?>"
                            autocomplete="url" autofocus>
                            <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    <div class="row">
                        <label for="img" class="col-md-4 col-form-label ">Profile Image</label>
                        <input type="file"
                        class="form-control-file"
                        name="img"
                         id="img">
                        <?php if ($errors->has('img')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('img'); ?>
                            <strong><?php echo e($message); ?></strong>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="row pt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecamp\resources\views/forms/editProfile.blade.php ENDPATH**/ ?>