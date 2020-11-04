@extends('layouts/app')

@section('content')

<div class="shop container pt-md-5">
    <div class="row">
        <div class="col-md-4">
            <brows-category></brows-category>
            <product-filter></product-filter>
        </div>
        <div class="col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light nav-shop">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Default sorting
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Show 12
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  </form>
                </div>
              </nav>
              <div class="row">
                  <div class="col-md-4 pt-2 pt-md-4">
                    <Product img-url="product1.png" category="accessories" name="watch" price="150"></Product> 
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
              </div>           
        </div>
    </div>
    <top-products></top-products>
</div>

@endsection