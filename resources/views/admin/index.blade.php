@extends('admin/app')

@section('content')


<div class="container pt-2 pt-md-4">
    <div class="row">
        <div class="col-md-6">
            <p class="admin-title">Creat New User</p>
            @include('layouts/errors')
            <form action="/user/store" method="POST"> 
                <div class="form-group">
                    <label for="is_admin">Admin</label>
                    <select name="is_admin" id="is_admin" class="form-control">
                        <option value="0" selected>No</option>
                        <option value="1">yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>  
                @csrf     
                <button class="btn btn-primary">save</button>
            </form> 
        </div>
        <div class="col-md-6">
            <search-a></search-a>
        </div>
    </div>
         
</div>


@endsection