<div class="container">
<a href='<?php echo e(route('post', $notification->data['comment']['post_id'])); ?>'>
    <strong><?php echo e($notification->data['comment']['user']['username']); ?></strong> commented on your post.
    <hr>
</a>
</div>
<?php /**PATH C:\xampp\htdocs\codecamp\resources\views/notification/comment_to_post.blade.php ENDPATH**/ ?>