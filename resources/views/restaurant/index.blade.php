@extends('layouts.default.layout')
@section('content')
<h2 class="font-blue-ebonyclay"> Basic info
</h2>
@if($restaurant)
<form action="/restaurant/{{$restaurant->id}}" class="form-horizontal" method="post">
<input type="hidden" name="restaurant_id" id="restaurant_id" 
    value="{{$restaurant->id or old($restaurant_id) }}">
<input name="_method" type="hidden" value="PUT">
@else
<form action="/restaurant" class="form-horizontal" method="post">
@endif
{{csrf_field()}}
<div class="form-body">	
	<h4 class="font-blue-ebonyclay"> Resturant Name</h4>
	<div class="form-group">
	    <div class="col-md-6">
	        <input type="text" class="form-control spinner" name="name"
            @if($restaurant)
            value="{{ $restaurant->name or old($name) }}"
            @endif
            > 
	    </div>
	</div>
    @if($restaurant)
	<h4 class="font-blue-ebonyclay"> Branches</h4>
	<div class="form-group col-md-12">
		<div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button id="branch_editable_table_new" class="btn btn-circle green-turquoise"> Add New
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered" id="branch_editable_table">
            <thead>
                <tr>
                    <th> Branch </th>
                    <th> Location </th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @if($branches)
                @foreach($branches as $branch)
                <tr id="{{$branch->id}}">
                    <td> {{$branch->name}} </td>
                    <td> {{$branch->address}} </td>
                    <td>
                        <a class="edit" href="javascript:;"> Edit </a>
                    </td>
                    <td>
                        <a class="delete" href="javascript:;"> Delete </a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
	</div>
    @endif
	<h4 class="font-blue-ebonyclay"> Cuisines</h4>
    <div class="form-group">
	    <div class="col-md-4">
	        <select class="bs-select form-control" name="cuisines[]" multiple required>
	           @foreach($cuisines as $cuisine)
                <option value="{{$cuisine->id}}"
                @if(in_array($cuisine->id,$restaurant_cuisines)) 
                    selected="selected"
                @endif
                > {{$cuisine->name}}</option>
               @endforeach
	        </select>
	    </div>
	</div>
	<h4 class="font-blue-ebonyclay"> Meals</h4>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="breakfast"  value="0" >
				<input type="checkbox" name="breakfast" value="1"  
                {{( ($restaurant && $restaurant->breakfast) ? 'checked' : '' )}} /> Breakfast
				<span></span>
			</label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="brunch"  value="0" >
                <input type="checkbox" name="brunch" value="1"
                {{( ($restaurant && $restaurant->brunch ? 'checked' : '' ) )}}/> Brunch
                <span></span>
            </label>
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="lunch"  value="0" >
				<input type="checkbox" name="lunch" value="1"
                {{( ($restaurant && $restaurant->lunch? 'checked' : '') )}}/> Lunch
				<span></span>
			</label>
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="dinner"  value="0" >
				<input type="checkbox" name="dinner" value="1"
                {{( ($restaurant && $restaurant->dinner? 'checked' : '' ) )}}/> Dinner
				<span></span>
			</label>
		</div>
	</div>
	<h4 class="font-blue-ebonyclay"> Restaurant	features</h4>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="dine_in"  value="0" >
				<input type="checkbox" name="dine_in"  value="1" 
                {{( ($restaurant && $restaurant->dine_in ? 'checked' : ''))}}/> Dine in
				<span></span>
			</label>
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="to_go"  value="0" >
				<input type="checkbox" name="to_go" value="1" 
                {{( ($restaurant && $restaurant->to_go ? 'checked' : ''))}}/> To go
				<span></span>
			</label>
			<label class="mt-checkbox mt-checkbox-outline">
                <input type="hidden" name="delivery"  value="0" >
				<input type="checkbox" name="delivery" value="1"
                {{( ($restaurant && $restaurant->delivery ? 'checked' : ''))}}/> Delivery
				<span></span>
			</label>
		</div>
	</div>
    @if($restaurant)
	<h4 class="font-blue-ebonyclay"> Users</h4>
	<div class="form-group col-md-12">
		<div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button id="user_editable_table_new" class="btn btn-circle green-turquoise"> Add New
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered" id="user_editable_table">
            <thead>
                <tr>
                    <th> User </th>
                    <th> Email </th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @if($users)
            @foreach($users as $user)
                @if(!($user->id == auth::user()->id))
                <tr id="{{$user->id}}">
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td>
                        <a class="edit" href="javascript:;"> Edit </a>
                    </td>
                    <td>
                        <a class="delete" href="javascript:;"> Delete </a>
                    </td>
                </tr>
                @endif
            @endforeach
            @endif
            @if($users)
            @foreach($invited_users as $invited)
                @if(!($invited->id == auth::user()->id))
                <tr id="{{$user->id}}">
                    <td> {{$invited->name}} </td>
                    <td> {{$invited->email}} </td>
                    @if($invited->status != 'successful')
                    <td>
                       Invitation is {{$invited->status}}
                    </td>
                    @endif
                    <td></td>
                </tr>
                @endif
            @endforeach
            @endif
            </tbody>
        </table>
	</div>
    @endif

</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-0 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>

@endsection