<template>
    <div class="card text-center border-0" style="width: 100%;">
        <div @mouseover="show=true" @mouseleave="show=false">
           <img :src="'./images/products/'+imgUrl" class="card-img-top" :alt="name" >
            <transition name="fade">
            <div v-if="show" class="card-img-overlay py-4 blue-btns-container">
                <button href="#" class="square-blue-btn"><img src="ico/search-light.svg" width="20px" alt="search"></button>
                <button href="#" class="square-blue-btn"><img src="ico/heart-light.svg" width="20px" alt="heart"></button>
                <button 
                v-if="auth_id != ''"
                href="#" 
                :class="['square-blue-btn', isCart?'bg-danger':'bg-pimary']"
                @click="addToCart(auth_id,product_id)">
                <img src="ico/shopping-cart-light.svg" width="20px" alt="shop">
                </button>
            </div> 
            </transition>
        </div>     
        <div class="card-body">
            <h5 class="card-title text-muted mb-0">{{category}}</h5>
            <a href="#" class="text-dark" @mouseover="show=true" @mouseleave="show=false">{{name}}</a>
            <p class="card-text text-muted">{{price}}$</p>          
        </div>
    </div>
</template>
<script>
import ProductClass from '../ProductClass';
export default {
    name: 'Product',
    data: function(){
        return{
            show: false,
            isCart:false,
        }
    },
    props:{
        imgUrl:String,
        category:[String, Number],
        categoryId:[String, Number],
        product_id:[String, Number],
        name:String,
        price:[Number, String],
        auth_id:[Number, String],
        isincart:Boolean,
    },
    mounted: function(){

    },
    methods:{
        showBtn: function(){
            this.show= true;
        },
        addToCart: function(userId, productId){
            let formData = new FormData();
            formData.append('user_id', userId);
            formData.append('product_id', productId);
           axios({
               method: 'POST',
               url:'/cart/store',
               data:formData,
           })
           .then(response =>{
              this.isCart = response.data[0];
              this.$emit('tocart',{isAdd: response.data[0], product:response.data[1]});
           }).catch();
           
        },
    },
    computed:{
        
    },
    watch:{
        isincart: function(newVal){
            this.isCart = newVal;
        }
    }
}
</script>
<style lang="scss" scoped>
    .card{
         h5{
             text-transform: capitalize;
             font-size:0.9rem;
         }
         a{
             font-size:1.2rem;
             text-transform: capitalize;
             font-family:'Times New Roman', Times, serif;
             font-weight:bold;
         }
         p{  
             font-size:1rem;
             font-family:'Times New Roman', Times, serif;
             font-weight:bold;
         }
         .blue-btns-container{
             background-color: rgba(255, 255, 255, 0.356);
             height: 70px;
             transition:0.5s;
             .square-blue-btn{
             background-color: rgba(60, 77, 234, 0.678);
             padding:6px;
             transition:0.1s;
             border: none;
                &:hover{
                    background-color: rgb(60, 77, 234);
                }
            }
         }        
    }
    .fade-enter-active, .fade-leave-active {
         transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>