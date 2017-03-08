@extends('layouts.default.layout')
@section('content')
@if($user)
<form action="/profile/{{$user->id}}" method="post" class="form-horizontal " id="edit_menu_item" enctype="multipart/form-data" >
{{csrf_field()}}
<input name="_method" type="hidden" value="PUT">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay">Name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name" value="{{$user->name}}"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay">Username</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="username" value="{{$user->username}}"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Address</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="address" value="{{$user->address}}"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Email</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="email"> {{$user->email}}</textarea>
        </div>
    </div>    
    <label>Profile Picture</label>
    @if( $user->photo) 
        <div><img src="{{asset($user->photo)}}"></div>
        <br>
        <label>Replace your old profile picture.</label>
    @endif
    <input type="file" name="photo">
    
</div>
<div class="form-actions"style="margin-top: 18px;">
    <div class="row">
        <div class="col-md-offset-0 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>
@endif
@endsection