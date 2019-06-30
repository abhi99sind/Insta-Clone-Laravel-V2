<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 pl-3">
                <input type="text" class="form-control" placeholder="Search" v-model="searchValue" @keyup.enter="search()">
                <!-- <div class="row" v-if="results.length">
                    <div class="text-center" v-for="user in results">
                        <h4 class="text-center">{{user.name}}</h4>
                    </div>
                </div> -->

            </div>

        </div>
    </div>
</template>
<script>
var algoliasearch = require('algoliasearch')
var client = algoliasearch('L40JDYRRSA' , '4ebb9b47f17961a229abc460c9bba093')
var index = client.initIndex('users')
export default {
    mounted(){

    },
    data(){
        return {
            searchValue:'',
            results:[]
        }
    },

    methods:{
        search(){
            index.search(this.searchValue , function(err,content){
                this.results = content.hits
                alert(this.results)
                localStorage.stringidata = JSON.stringify(this.results)
                window.location.href = '/getUsers'

            })
        }

    }
}
</script>
