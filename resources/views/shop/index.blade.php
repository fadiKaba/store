@extends('layouts/app')

@section('content')

<div class="shop container pt-md-5">
    <div class="row">
        <div class="col-md-4">
            <brows-category></brows-category>
            <product-filter></product-filter>
        </div>
        <div class="col-md-8">   
          @include('layouts/errors')         
           <products-container 
           auth="{{Auth::check() && Auth::user()->is_admin == 1?'true':'false' }}"
           csrf="{{csrf_token()}}"
           auth_id="{{Auth::id()}}"
           @cart="getCart($event)">
           </products-container>          
        </div>
    </div>
    <top-products></top-products>
</div>

@endsection