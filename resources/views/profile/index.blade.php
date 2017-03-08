@extends('layouts.default.layout')
@section('content')
<h1 class="page-title"> Profile
    <small></small>
</h1>

<div>
	<img src="
	@if(isset($user['photo']))
		{{$user['photo']}}
	@else 
	/layouts/admin2/img/avatar.png
	@endif
	">
</div>
<br>
<div>
	<h5>Name</h5>
	@if(isset($user['name']))
		{{$user['name']}}
	@else 
	No name yet.
	@endif
</div>
<br>
<div>
	<h5>Username</h5>
	@if(isset($user['username']))
		{{$user['username']}}
	@else 
	No Username yet.
	@endif
</div>

<br>
<div>
	<h5>Email</h5>
	@if(isset($user['email']))
		{{$user['email']}}
	@else 
	No email yet.
	@endif
</div>

<br>
<div>
	<a href="/profile/{{$user['id']}}/edit" class="btn btn-circle green-turquoise">Edit</a>
</div>
@endsection