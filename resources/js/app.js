/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Product from './components/Product';
import BrowsCategory from './components/BrowsCategory';
import ProductFilter from './components/ProductFilter';
import TopProducts from './components/TopProducts';
import SearchA from './components/SearchA';
import ProductsContainer from './components/ProductsContainer';
import ProductClass from './ProductClass';
import Axios from 'axios';
Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
const app = new Vue({
    el: '#app',
    components:{Product, BrowsCategory, ProductFilter, TopProducts, SearchA, ProductsContainer},
    data: function(){
        return{
            recievedItems:[],
            items:[],
            itemsCount: 0,
            auth_id:'',
            cartProductsIds:[]
        }
    },
    mounted:function(){
      if(this.$userId != '')  this.getCartMain();
    },
    methods:{
        getCart(arr){
           // console.log(arr);
            if(arr.length > 0){
                arr.forEach(item => {
                    this.recievedItems.push(item.product[0]);
                })      
                this.recievedItems.forEach(item => {this.makeProductItem(item)});
                this.addItemsToCart(this.items);                              
            }          
        },
        //adding an object ProductClass to items
        makeProductItem: function(item){
           let productItem = new ProductClass(
            item.product_id,
            item.product_name,
            item.product_img,
            item.product_price,
            item.product_quantity,
            item.company_id,
            item.category_id,
            '',
            item.product_availability,
            item.product_trending,
            item.product_description,
            item.created_at,
            item.updated_at
           );
           this.items.push(productItem);
           this.cartProductsIds.push(productItem.product_id);
           this.itemsCount = this.recievedItems.length; 
        },
        addItemsToCart(arr){
            let cart = document.querySelector('#cart');
            let cartContent = "";
            arr.forEach(el => {
            cartContent += `
            <li class="list-group-item">
                <div class="card mb-3 border-0" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="/images/products/${el.product_img}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${el.product_name}</h5>
                                <p class="card-text">${el.product_price}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;
            });       
            cart.innerHTML = cartContent;
        },
        getCartMain: function(){
            if(this.$userId != ''){
               axios.get(`/cart/${this.$userId}`)
               .then(response => {
                this.getCart(response.data);
                }) 
            }   
        },
        toCart: function(e){
            let pt = e.product[0].product[0]
            if(e.isAdd == false){
               let el = this.items.findIndex(x => x.product_id == pt.product_id);
               this.items.splice(el, 1);
               this.addItemsToCart(this.items);
             //  this.itemsCount--;
            }else{
                this.makeProductItem(pt);
                this.addItemsToCart(this.items);
              //  this.itemsCount++;
            }
        }
    }
});

