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
                <td>  {{$item->pu_count }} {{$item->purchase_unit->first()->name}} </td>
                <td> {{$item->category->first()->name}} </td>
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


<h2 class="font-blue-ebonyclay"> Add Item</h2>
<form action="/inventory" class="form-horizontal " method="POST">
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay"> Item name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay"> Category</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name='category_id'>
            <option></option>
            @if($categories)
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
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
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Purchase Unit Count</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="pu_count">
        </div>
    </div>
    <h4>Purchase Unit Price (PUP)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="pu_price">
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Inventory Count Unit (CU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="count_unit_id">
                <option></option>
                @if($count_units)
                @foreach($count_units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <h4>Number of Count Units per Purchase Unit (# of CU per PU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="number" class="form-control spinner" name="number_of_cu_per_pu">
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay">Inventory Count Unit size(dimensions)</h4>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="cu_length" placeholder="Length"> 
            <input type="text" class="form-control" name="cu_width" placeholder="Width"> 
            <input type="text" class="form-control" name="cu_height" placeholder="Height">
            <select class="bs-select form-control col-md-4" name="cu_size_unit_id">
                <option></option>
                @if($units)
                @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
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
            name="remaining_shelf_life" placeholder="0"> 
            <select class="bs-select form-control col-md-4" name="remaining_shelf_life_unit_id">
                <option></option>
                @if($time_units)
                @foreach($time_units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
                @endif
            </select> 
        </div>
    </div>
     
</div>

<div class="form-actions">
    <div class="row">
        <div class=" col-md-9">
            <button type="submit" class="btn btn-lg btn-circle green">Save</button>
        </div>
    </div>
</div>
</form>

</div>
@endif
@endsection