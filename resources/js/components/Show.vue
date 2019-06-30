<template>
    <div class="container">
        <h1>Users Info</h1>
        <div class="row" v-for="data in data">
            <li>
                <a :href="'/profiles/'+data.id">{{data.name}}</a>
            </li>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        console.log('Component Mounted')
        this.data = JSON.parse(localStorage.data)
    },
    data(){
        return {
            data: ''
        }
    }
}
</script>
