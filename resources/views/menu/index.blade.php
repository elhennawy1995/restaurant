@extends('layouts.default.layout')
@section('content')
<h2 class="font-blue-ebonyclay"> Menu
</h2>
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h4 class="font-blue-ebonyclay"> Items
</h4>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light" id="menu_items_table">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th> Price </th>
                <th> Category </th>
                <th> Side </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($items)
            @foreach($items as $item)
            <tr id={{$item->id }} >
                <td> {{$item->name}} </td>
                <td> ${{$item->price}}</td>
                <td> 
                @foreach($item->categories as $category)
                {{$category->name}}, 
                @endforeach
                </td>
                <td> 
                @foreach($item->sides as $side)
                {{$side->name}}, 
                @endforeach 
                </td>
                <td>
                    <a href="/menu/{{$item->id}}/edit" class="edit" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a  class="delete" href="javascript:;"> Delete </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Add Item</h2>
<form action="/menu" method="post" class="form-horizontal " id="add_menu_item" enctype="multipart/form-data" >
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay"> Item name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Price</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="price" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>    
    <h4 class="font-blue-ebonyclay">Sides</h4>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="sides[]" multiple>
            @if($sides)
            @foreach($sides as $side)
                <option value="{{$side->id}}">{{$side->name}}</option>
            @endforeach
            @endif
            </select>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay">Related Disposables</h4>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="disposables[]" multiple>
            @if($disposables)
            @foreach($disposables as $disposable)
                <option value="{{$disposable->id}}">{{$disposable->name}}</option>
            @endforeach
            @endif
            </select>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Category</h4>
    <div class="form-group col-md-12">
        <div class="mt-checkbox-inline">
        @if($categories)
        @foreach($categories as $category)
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="categories[]" value="{{$category->id}}" /> {{$category->name}}
                <span></span>
            </label>
        @endforeach
        @endif
        </div>
    </div>
	<h4 class="font-blue-ebonyclay"> Meal type</h4>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
		@if($meal_types)
        @foreach($meal_types as $type)
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="meal_types[]" value="{{$type->id}}" /> {{$type->name}}
                <span></span>
            </label>
        @endforeach
        @endif

		</div>
	</div>
    <input type="file" name="photo">
    
</div>
<div class="form-actions" style="margin-top: 18px;">
    <div class="row">
        <div class="col-md-offset-0 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>
@endif
@endsection