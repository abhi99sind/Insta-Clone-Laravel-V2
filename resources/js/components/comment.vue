<template>
    <div>
        <div class="media" v-for="comment in comments">
            <p><strong>{{comment.user.name}}</strong> {{comment.body}}</p>
        </div>
        <div style="margin-bottom:50px;">
          <input class="form-control" name="body" placeholder="Post a comment" v-model="commentValue">
          <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Post Comment</button>
        </div>
    </div>
</template>
<script>
export default {
    props:['po','users'],
    data: function(){
        return {
            comments:[],
            commentValue: '',
            post:this.po,
            user:this.users
        }
      },
      mounted(){
          this.post = JSON.parse(this.post);
          this.user = JSON.parse(this.user);
          this.getComments();
          this.listen();
      },
      methods:{
        getComments(){
            var id = this.post.id;
          axios.get('/api/po/'+id+'/comments')
            .then((response) => {
              this.comments = response.data
            })
            .catch(function (error){
              console.log(error);
            });
        },
        postComment(){
            axios.post('/api/po/'+this.post.id+'/comment', {
                user_id: this.post.user.id,
                post_id: this.post.id,
                api_token: this.user.api_token,
                body: this.commentValue
            })
            .then((response) => {
               // this.comments.unshift(response.data);
                this.commentValue = '';
            })
            .catch(function (error){
                console.log(error);
            });
        },
        listen(){
          Echo.channel('post.'+this.post.id)
            .listen('NewComment', (comment) => {
              this.comments.unshift(comment);
            })
        }
    }
}
</script>
