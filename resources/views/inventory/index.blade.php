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
                <td> {{$item->category->name}} </td>
                <td> $ {{$item->pu_count * $item->pu_price}} </td>
                <td>
                    <a href="/inventory/{{$item->id}}/edit" class="edit btn btn-circle green-turquoise" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete btn btn-circle green-turquoise" href="javascript:;" > Delete </a>
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
            <input type="text" class="form-control spinner" name="name" required=""> 
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
            <select class="bs-select form-control" name='category_id' required="">
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
            <select class="bs-select form-control" name="purchase_unit_id" required="">
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
            <input type="text" class="form-control spinner" name="pu_count" required="">
        </div>
    </div>
    <h4>Purchase Unit Price (PUP)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="pu_price" required="">
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Inventory Count Unit (CU)</h4>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" name="count_unit_id" required="">
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
            <input type="number" class="form-control spinner" name="number_of_cu_per_pu" required="">
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay">Inventory Count Unit size(dimensions)</h4>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="cu_length" placeholder="Length" required=""> 
            <input type="text" class="form-control" name="cu_width" placeholder="Width" required=""> 
            <input type="text" class="form-control" name="cu_height" placeholder="Height" required="">
            <select class="bs-select form-control col-md-4" name="cu_size_unit_id" required="">
                <option></option>
                @if($units)
                @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
                @endif
            </select> 
            <a href="javascript:;" class="btn btn-icon-only default">
                <i class="fa fa-plus white"></i>
            </a>
        </div>
    </div>
    <div class="form-group"></div>
    <h4 class="font-blue-ebonyclay">Estimated remaining shelf life</h4>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control" id="ersl" 
            name="remaining_shelf_life" placeholder="0"> 
            <select class="bs-select form-control col-md-4" name="remaining_shelf_life_unit_id" required="">
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
<br>
<div>
<!-- <h4 class="font-blue-ebonyclay"> Purchase Options</h4>
<div class="form-group col-md-12">
    <div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <button id="purchase_editable_table_new" class="btn btn-circle green-turquoise"> Add New
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="purchase_editable_table">
        <thead>
            <tr>
                <th> Purchase Unit (PU) </th>
                <th> Quantity </th>
                <th>Price</th>
                <th>edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr id="">
                <td>  </td>
                <td>  </td>
                <td>
                    <a class="edit btn btn-circle green-turquoise" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete btn btn-circle green-turquoise" href="javascript:;"> Delete </a>
                </td>
            </tr>
        </tbody>
    </table>
</div> -->
</div>
<div class="form-actions" style="margin-top: 62px;">
    <div class="row">
        <div class="col-md-offset-0 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>

</div>
@endif
@endsection