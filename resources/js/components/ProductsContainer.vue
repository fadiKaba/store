<template>
    <div class="prducts-container mb-2 mb-md-4"> 
        
        <div v-if="auth == 'true'" class="add-new-product">
            <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 <img src="/ico/add.svg" alt="Add" width="30px">
            </button>
                <div class="collapse mb-2" id="collapseExample">
                <div class="card card-body">
                    <div>
                        <p>Add new product</p>
                        <form action="./product/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                               <label for="product-name">Product Name</label>
                               <input class="form-control" type="text" name="product_name" id="product_name"> 
                            </div>
                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" class="form-control-file" id="product_image" name="product_image">
                            </div>
                             <div class="form-group">
                                 <label for="product_price">Price</label>
                                 <input class="form-control" type="number" name="product_price" id="product_price">
                             </div>
                             <div class="form-group">
                                 <label for="product_category">Category</label>
                                 <select class="form-control" id="product_category" name="product_category">
                                     <option value="1">cat</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="product_company">Company</label>
                                 <select class="form-control" id="product_company" name="product_company">
                                     <option value="1">com</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="product_availability">Availability</label>
                                 <select class="form-control" type="number" name="product_availability" id="product_availability">
                                     <option value="1">Available</option>
                                     <option value="1">Not available</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="product_quantity">Quantity</label>
                                 <input class="form-control" type="number" name="product_quantity" id="product_quantity">
                             </div>
                             <div class="form-group">
                                 <label for="product_description">Description</label>
                                 <textarea 
                                 class="form-control" 
                                 name="product_description" 
                                 id="product_description" 
                                 cols="30" rows="5"
                                 placeholder="Description"></textarea>
                             </div>
                             <input type="hidden" name="_token" :value="csrf">
                             <button class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
         
        <search-bar></search-bar>    
        <div class="row mt-2 mt-md-4">  
            <div v-if="errors!=''" class="alert alert-danger" role="alert">
                 {{errors}}
            </div> 
            <div v-for="product in products" :key="'p'+product.product_id" class="col-md-4 mt-3">
                <product 
                :img-url="(product.product_img != null) && (product.product_img != '')?product.product_img:'no_image.jpg'" 
                :category="product.category_name"
                :categoryId="product.product_category" 
                :product_id="product.product_id"
                :name="product.product_name" 
                :price="product.product_price"
                :auth_id="auth_id"
                v-on:to-cart="addToCart($event)"></product>
            </div>
        </div> 
    </div>
</template>
<script>

import Product from './Product';
import SearchBar from './SearchBar';
import ProductClass from '../ProductClass';

export default {
    name:'ProductsContainer',
    components:{Product, SearchBar},
    props:{
        auth: String,
        csrf: String,
        auth_id: [Number, String]
    },
    data: function(){
        return{
            products: [],
            errors:'',
        }
    },
    created:function(){
        this.getProducts();
        this.getCart();
    },
    methods:{
        getProducts: function(){
            axios.get('/product/all')
            .then(response =>{               
                response.data.forEach(item => {
                   let nProduct = new ProductClass(
                       item.product_id,
                       item.product_name,
                       item.product_img,
                       item.product_price,
                       item.product_quantity,
                       item.company_id,
                       item.category_id,
                       item.category.category_name,
                       item.product_availability,
                       item.product_trending,
                       item.product_description,
                       item.created_at,
                       item.updated_at
                   );
                   this.products.push(nProduct);
                   this.errors='';
                })                
            }).catch(err => console.log(this.errors = err));
        },
        getCart: function(){
            axios.get(`/cart/${this.auth_id}`)
            .then(response => {
                this.$emit('cart', response.data);
                })
        },
        addToCart: function(event){
          console.log(event);
        },
    },

}
</script>
<style scoped>

</style>