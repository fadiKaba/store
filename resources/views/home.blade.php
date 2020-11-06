@extends('layouts.app')

@section('content')
<div class="home container-fluid">
    <div class="cover row align-items-end">
        <div class="row container-fluid mx-auto">
            <div class="col-md-6 left"></div>
            <div class="col-md-6 right d-flex align-items-center">
                <div class="show-case-content">
                    <h4>Shop is fun</h4>
                    <h2>Brows our<br> premium product</h2>
                    <p class="mt-md-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt illo atque,
                        eum exercitationem, amet maiores repellat quas in dolores nostrum voluptates 
                        nobis iure officia enim accusamus dicta magni unde debitis aspernatur blanditiis 
                        praesentium rerum nulla vero! Officiis sed veritatis libero, explicabo vitae 
                        consequatur non. Totam beatae facere quas enim pariatur.
                    </p>
                </div>           
            </div>
        </div>
    </div> 
    <section class="trending-product mt-2 mt-md-4">
         <div class="container">
              <p class="text-muted mb-0">Popular Item in the market</p>
              <h2 class="pb-2 pb-md-5">Trending <span>Products</span></h2>
              <div class="products-container">
                 <products-container></products-container>
              </div>             
         </div>
    </section>  
    <section class="sale">
       <div class="sale-container row d-flex align-items-center">
            <div class="col-md-6 text-center">
                <h3>Up to 50% off</h3>
                <h4>Winter Sale</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, voluptas?</p>
                <button class="btn btn-primary">Shop Now</button>
            </div> 
            <div class="col-md-6"></div>                    
       </div>
    </section>
</div>
@endsection
