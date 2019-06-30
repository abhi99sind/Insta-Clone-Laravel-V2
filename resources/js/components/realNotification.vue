<template>

</template>
<script>
export default {
   props:['id'],
   mounted(){
       this.listen();
   },
   methods:{
       listen(){
           Echo.private('App.User.'+ this.id)
                .notification((notification) => {
                    this.$store.commit('add_not',notification)

                })
       }
   }

}
</script>
