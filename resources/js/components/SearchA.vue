<template>
    <div>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Users</a>
            <form class="form-inline my-2 my-lg-0">
                <input 
                class="form-control mr-sm-2" 
                type="search" 
                placeholder="Search" 
                aria-label="Search"
                v-model="val"
                @keyup="search(val)">
            </form>
        </nav>
        <div class="users-container">
            <ul v-if="val.length < 2" class="list-group list-group-flush">
                <li 
                class="list-group-item" 
                v-for="user in users" 
                :key="user.id">
                {{user.name}}</li>
            </ul>
            <div class="pt-2">
                <button 
                class="btn btn-primary"
                v-if="currentPage > 1"
                @click="getLastPage()">Prev</button>
                <button 
                class="btn btn-primary"
                v-if="currentPage < lastPage"
                 @click="getNextPage()"
                 >Next</button>
            </div>           
        </div>
    </div>
</template>
<script>
export default {
    name:'searchA',
    data: function(){
        return{
            val:'',
            currentPage:1,
            lastPage:1,
            users:[],
        }
    },
    created:function(){
        this.getUsers();
    },
    methods:{
        getUsers: function(){
            axios.get(`user/all`)
            .then(response =>{
                console.log(response.data);
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.users = response.data.data
            } )
            .catch(err => console.log(err))
        },
        search: function(item){
            //console.log(item)
            if(item.length > 1){
               axios.get(`user/${item}/search`)
               .then(response => console.log(response.data))
               .catch(err => console.log(err)) 
            }          
        },
        getNextPage: function(){
            axios.get(`user/all?page=${++this.currentPage}`)
            .then(response =>{
                console.log(response.data);
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.users = response.data.data
            } )
            .catch(err => console.log(err))
        },
        getLastPage: function(){
            axios.get(`user/all?page=${--this.currentPage}`)
            .then(response =>{
                console.log(response.data);
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.users = response.data.data
            } )
            .catch(err => console.log(err))
        }
    }
}
</script>
<style lang='scss' scoped>

</style>