<template>
<div>
    <a href="/nots"><button type="button" href="/nots" class="btn btn-light">
  Notifications <span class="badge badge-info">{{all_nots_count}}</span>
</button></a>
</div>
</template>
<script>
export default {
    mounted(){
        this.getUnread();
    },
    computed:{
        all_nots_count(){
            return this.$store.getters.all_nots_count;
        }
    },
    methods:{
        getUnread(){
            axios.get('/unread_nots')
                .then((nots) => {
                    nots.data.forEach((not) => {
                        this.$store.commit('add_not',not)
                    });
                })
        }
    }
}
</script>

