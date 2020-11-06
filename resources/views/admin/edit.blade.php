@extends('admin/app')

@section('content')

<div class="container mt-2 mt-md-4">
    <p class="admin-title">Edit User {{$user->name}}</p>
    @include('layouts/errors')
    <form action="{{'/user/'.$user->id}}" method="POST"> 
        @method('PATCH')
        <div class="form-group">
            <label for="is_admin">Admin</label>
            <select name="is_admin" id="is_admin" class="form-control">
               @if($user->is_admin == 0) 
               <option selected value="0">No</option>
               <option value="1">Yes</option>
               @else
               <option selected value="1">Yes</option>
                <option value="0">No</option>
               @endif
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>
        @csrf     
        <button class="btn btn-primary">save</button>
    </form>
</div>

@endsection