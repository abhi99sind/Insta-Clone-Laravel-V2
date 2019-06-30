<div class="container">
<a href='{{ route('post', $notification->data['comment']['post_id'])}}'>
    <strong>{{$notification->data['comment']['user']['username']}}</strong> commented on your post.
    <hr>
</a>
</div>
