<template>
    <div class="product-filter pt-2 pt-md-5">
        <div>
            <h3>Product Filter</h3>       
            <div class="comp-container">
                <div v-for="companie in companies" :key="companie.id" class="form-check">
                    <input type="radio" 
                    v-model="choise"
                    class="form-check-input" 
                    :name="companie" 
                    :id="companie+'id'" 
                    :value="companie">
                    <label class="form-check-label pb-2" for="">{{companie}}</label>
                </div>
                <div class="dropdown-divider"></div>
                <label for="priceRange1">Price range</label>
                <input type="range" min="0" max="5" class="custom-range" id="priceRange1" value="2">
            </div>            
        </div>
    </div>
</template>
<script>
export default {
    name: 'ProductFilter',
    data: function(){
        return{
            companies: ['Apple', 'Asus', 'Samsung', 'Micromax', 'HP', 'Rolex'],
            choise:'',

        }
    }
}
</script>
<style lang="scss" scoped>
    .product-filter{
        h3{
            background-color: rgb(60, 77, 234);
            color:#fff;
            font-weight: bold;
            font-size: 1rem;
            padding:15px;
        }
        .comp-container{
            background-color:rgb(241, 246, 247);
            padding: 15px;
        }
        label{
            text-transform: capitalize;
            color:grey;
            font-size: 1rem;
        }
    }
</style>