<template>
    <div class="brows-category">
        <div>
            <h3>Browse Categories</h3>       
            <div class="cat-container">
                <div v-for="category in categories" :key="category.id" class="form-check">
                    <input type="radio" 
                    v-model="choise"
                    class="form-check-input" 
                    :name="category" 
                    :id="category+'id'" 
                    :value="category">
                    <label class="form-check-label pb-2" for="">{{category}}</label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'BrowsCategory',
    data: function(){
        return{
            categories: ['Men', 'Women', 'Accessories', 'Footwear', 'Electronics', 'Food'],
            choise:'',

        }
    }
}
</script>
<style lang="scss" scoped>
    .brows-category{
        h3{
            background-color: rgb(60, 77, 234);
            color:#fff;
            font-weight: bold;
            font-size: 1rem;
            padding:15px;
        }
        .cat-container{
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