@extends('layouts.default.layout')
@section('content')
<h2 class="font-blue-ebonyclay"> Menu
</h2>
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
                    <a href="/menu/{{$item->id}}/edit" class="edit btn btn-circle green-turquoise" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete btn btn-circle green-turquoise" href="javascript:;"> Delete </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Edit Item</h2>
@if($edit_item)
<form action="/menu/{{$edit_item->id}}" method="post" class="form-horizontal " id="edit_menu_item" enctype="multipart/form-data" >
{{csrf_field()}}
<input name="_method" type="hidden" value="PUT">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay"> Item name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name" value="{{$edit_item->name}}" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Price</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="price" value="{{$edit_item->price}}" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> {{$edit_item->description}}</textarea>
        </div>
    </div>    
    <h4 class="font-blue-ebonyclay">Sides</h4>
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
    <h4 class="font-blue-ebonyclay">Related Disposables</h4>
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
    <h4 class="font-blue-ebonyclay"> Category</h4>
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
	<h4 class="font-blue-ebonyclay"> Meal type</h4>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
		@if($meal_types)
        @foreach($meal_types as $type)
             @if( ($type->name == 'Lunch'&&$restaurant->lunch == 1)  || 
            ($type->name == 'Breakfast'&& $restaurant->breakfast == 1) ||
            ($type->name == 'Brunch'&&$restaurant->brunch == 1) ||
            ($type->name == 'Dinner'&&$restaurant->dinner == 1)
            )
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="meal_types[]" value="{{$type->id}}" 
                @if(in_array($type->id, $item_meal_types))
                checked='true'
                @endif
                /> {{$type->name}}
                <span></span>
            </label>
            @endif
        @endforeach
        @endif



		</div>
	</div>
    <label>Replace image</label>
    <input type="file" name="photo">
    @if( $edit_item->relationLoaded('photo') && $edit_item->photo->count()>0) 
    <img src="{{asset($edit_item->photo->last()->path)}}">
    @endif
    
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