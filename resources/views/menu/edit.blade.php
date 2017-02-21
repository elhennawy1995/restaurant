@extends('layouts.default.layout')
@section('content')
<h2 class="font-blue-ebonyclay"> Menu
</h2>
<h3 class="font-blue-ebonyclay"> Items
</h3>
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
                    <a class="delete" href="javascript:;"> Delete </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Edit Item</h2>
@if($eidt_item)
<form action="/menu/{{$eidt_item->id}}" method="post" class="form-horizontal " id="edit_menu_item">
{{csrf_field()}}
<input name="_method" type="hidden" value="PUT">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay"> Item name</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name" value="{{$eidt_item->name}}"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Price</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="price" value="{{$eidt_item->price}}"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Description</h3>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> {{$eidt_item->description}}</textarea>
        </div>
    </div>    
    <h3 class="font-blue-ebonyclay">Sides</h3>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="sides[]" multiple>
            @if($sides)
            @foreach($sides as $side)
                <option value="{{$side->id}}"
                @if(in_array($side->id, $item_sides))
                selected = "selected"
                @endif
                >{{$side->name}}</option>
            @endforeach
            @endif
            </select>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay">Related Disposables</h3>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="disposables[]" multiple>
            @if($disposables)
            @foreach($disposables as $disposable)
                <option value="{{$disposable->id}}"
                @if(in_array($disposable->id, $item_disposables))
                selected = "selected"
                @endif
                >{{$disposable->name}}</option>
            @endforeach
            @endif
            </select>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Category</h3>
    <div class="form-group col-md-12">
        <div class="mt-checkbox-inline">
        @if($categories)
        @foreach($categories as $category)
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="categories[]" value="{{$category->id}}"
                @if(in_array($category->id, $item_categories))
                checked = "true"
                @endif
                 /> {{$category->name}}
                <span></span>
            </label>
        @endforeach
        @endif
        </div>
    </div>
	<h3 class="font-blue-ebonyclay"> Meal type</h3>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
		@if($meal_types)
        @foreach($meal_types as $type)
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="meal_types[]" value="{{$type->id}}" 
                @if(in_array($type->id, $item_meal_types))
                checked='true'
                @endif
                /> {{$type->name}}
                <span></span>
            </label>
        @endforeach
        @endif

		</div>
	</div>

    
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-circle green">Save</button>
        </div>
    </div>
</div>
</form>
@endif
@endsection