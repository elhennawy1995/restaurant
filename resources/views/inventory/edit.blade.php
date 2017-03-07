@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Inventory
</h2>
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h4 class="font-blue-ebonyclay"> Items
</h4>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light" id="inventory_items_table">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th> Units </th>
                <th> Category </th>
                <th> Cost </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if($items)
        @foreach($items as $item)
            <tr id={{$item->id }}>
                <td> {{$item->name }}</td>
                <td>  {{$item->pu_count }} {{$item->purchase_unit->name}} </td>
                <td> {{$item->category->name}} </td>
                <td> $ {{$item->pu_count * $item->pu_price}} </td>
                <td>
                    <a href="/inventory/{{$item->id}}/edit" class="edit" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete" href="javascript:;"> Delet </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@if($edit_item)
<h2 class="font-blue-ebonyclay"> Edit Item</h2>
<form action="/inventory/{{$edit_item->id}}" class="form-horizontal " method="POST">
{{csrf_field()}}
<input name="_method" type="hidden" value="PUT">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay"> Item name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name"
            value="{{$edit_item->name}}"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"
            >{{$edit_item->description}}</textarea>
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay"> Category</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name='category_id'>
            <option></option>
            @if($categories)
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                @if($category->id == $edit_item->category->id)
                selected="selected"
                @endif
                >{{$category->name}}</option>
            @endforeach
            @endif
            </select>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Purchase Unit (PU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="purchase_unit_id">
                <option></option>
                @if($purchase_units)
                @foreach($purchase_units as $unit)
                    <option value="{{$unit->id}}"
                    @if($unit->id == $edit_item->purchase_unit->id)
                    selected="selected"
                    @endif
                    >{{$unit->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Purchase Unit Count</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="pu_count"
            value="{{$edit_item->pu_count}}">
        </div>
    </div>
    <h4>Purchase Unit Price (PUP)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="pu_price"
            value="{{$edit_item->pu_price}}">
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Inventory Count Unit (CU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="count_unit_id">
                <option></option>
                @if($count_units)
                @foreach($count_units as $unit)
                    <option value="{{$unit->id}}"
                    @if($unit->id == $edit_item->count_unit->id)
                    selected="selected"
                    @endif
                    >{{$unit->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <h4>Number of Count Units per Purchase Unit (# of CU per PU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="number" class="form-control spinner" name="number_of_cu_per_pu"
            value="{{$edit_item->number_of_cu_per_pu }}">
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay">Inventory Count Unit size(dimensions)</h4>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="cu_length" placeholder="Length"
            value="{{$edit_item->cu_length}}"> 
            <input type="text" class="form-control" name="cu_width" placeholder="Width"
            value="{{$edit_item->cu_width}}"> 
            <input type="text" class="form-control" name="cu_height" placeholder="Height"
            value="{{$edit_item->cu_height}}">
            <select class="bs-select form-control col-md-4" name="cu_size_unit_id">
                <option></option>
                @if($units)
                @foreach($units as $unit)
                    <option value="{{$unit->id}}"
                    @if($unit->id == $edit_item->count_unit_size_unit->id)
                    selected="selected"
                    @endif
                    >{{$unit->name}}</option>
                @endforeach
                @endif
            </select> 
        </div>
    </div>
    <div class="form-group"></div>
    <h4 class="font-blue-ebonyclay">Estimated remaining shelf life</h4>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control" id="ersl" 
            name="remaining_shelf_life" placeholder="0" 
            value=" {{$edit_item->remaining_shelf_life}}"> 
            <select class="bs-select form-control col-md-4" name="remaining_shelf_life_unit_id">
                <option></option>
                @if($time_units)
                @foreach($time_units as $unit)
                    <option value="{{$unit->id}}"
                    @if($unit->id == $edit_item->remaining_shelf_life_unit->id)
                    selected="selected"
                    @endif
                    >{{$unit->name}}</option>
                @endforeach
                @endif
            </select> 
        </div>
    </div>
     
</div>

<div class="form-actions" style="margin-top: 62px;">
    <div class="row">
        <div class="col-md-offset-0 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>
@endif
</div>
@endif
@endsection