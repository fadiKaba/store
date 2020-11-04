<template>
    <div class="top-products pt-2 pt-md-4">
        <p class="text-muted mb-0">Popular Item in the market</p>
        <h3> Top <span>products</span></h3>
        <div class="row p-2 p-md-5">
            <div class="col-md-3">
                <div class="media">
                    <img 
                    src="images/products/product1.png" 
                    class="align-self-center mr-3" 
                    alt="..."
                    width="70px">
                    <div class="media-body">
                        <h5 class="mt-0">watch</h5>
                        <p class="mb-0">$150</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>
    .top-products{
        h3{
            font-size: 2rem;
            text-transform: capitalize;
            font-weight: bold;
            font-family: 'Oswald', sans-serif;
           span{
               padding-bottom: 10px;
               border-bottom:rgb(60, 77, 234) 2px solid;
           }
        }
        .media{
            .media-body{
                p{
                    color:grey;
                    font-weight: bold;
                }
            }
        }
    }
</style>