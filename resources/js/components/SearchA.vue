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
                    <div class="d-flex justify-content-between">
                        <span>{{user.name}} <a class="email-color">{{user.email}}</a></span>
                        <span class="d-flex">
                            <a :href="'user/'+user.id+'/edit'" class="mr-2">Edit</a>
                            <form :action="'/user/'+user.id" method="POST" @submit="confirmation">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="csrf">
                            <button class="btn btn-link p-0" @click="returnName(user.name)">Delete</button>
                            </form> 
                        </span>                  
                    </div>                            
                </li>
            </ul>
            <ul v-if="results != 'Not found' && val.length > 1" class="results-container overflow-auto list-group list-group-flush">
                <li 
                class="list-group-item"
                v-for="result in results" 
                :key="result.id">
                    <div class="d-flex justify-content-between">
                        <span>{{result.name}} <a class="email-color">{{result.email}}</a></span>
                        <span class="d-flex">
                            <a :href="'user/'+result.id+'/edit'" class="mr-2">Edit</a>
                            <form :action="'/user/'+result.id" method="POST" @submit="confirmation">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="csrf">
                            <button class="btn btn-link p-0" @click="returnName(result.name)">Delete</button>
                            </form> 
                        </span>                      
                    </div>
                </li>
            </ul>
            <div v-if="val.length < 2" class="pt-2">
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
    props:['csrf'],
    data: function(){
        return{
            val:'',
            currentPage:1,
            lastPage:1,
            users:[],
            results:'Not found',
            name:'',
        }
    },
    created:function(){
        this.getUsers();
    },
    methods:{
        getUsers: function(){
            axios.get(`user/all`)
            .then(response =>{
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.users = response.data.data
            } )
            .catch(err => console.log(err))
        },
        search: function(item){
            if(item.length > 1){
               axios.get(`user/${item}/search`)
               .then(response => {
                  if(response.data != 'Not found'){
                      this.results = response.data
                  } else{
                      this.results = "Not found"
                  }
               })
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
        },
        returnName(name){
            return this.name = name;
        },
        confirmation: function(e){
         let approve = confirm('Are you sure? Delete '+this.name);
         if(!approve){
           e.preventDefault();
         }
        }
    }
}
</script>
<style lang='scss' scoped>
    .results-container{
        max-height: 70vh;
    }
    .email-color{
        color:rgb(60, 77, 234);
        cursor: pointer;
    }
</style>