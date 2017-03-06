@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<!-- <h2 class="font-blue-ebonyclay"> Inventory
</h2>  -->
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h2 class="font-blue-ebonyclay"> Storages
</h2>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light" id="storages_table">
        <thead>
            <tr class="uppercase">
                <th> Storage </th>
                <th> Size </th>
                <th> Shelfs </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if($storages)
        @foreach($storages as $storage)
            <tr id="{{$storage->id}}">
                <td> {{$storage->name }}</td>
                <td>  {{$storage->length * $storage->width * $storage->height }} {{$storage->unit->name }} </td>
                <td>  {{$storage->shelfs}}</td>
                <td>
                    <a href="/storages/{{$storage->id}}/edit" class="edit" href="javascript:;"> Edit </a>
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


<h2 class="font-blue-ebonyclay"> Edit Storage</h2>
<form action="/storages/{{$selected_storage->id}}" class="form-horizontal " method="POST">
{{csrf_field()}}
<input type="hidden" name="_method" value="PUT">
<!-- <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}"> -->
<div class="form-body">	
    <h4 class="font-blue-ebonyclay">Name </h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name"
            value="{{$selected_storage->name}}"> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description">{{$selected_storage->description}}</textarea>
        </div>
    </div>  
    <h4 class="font-blue-ebonyclay">Storage size(dimensions)</h4>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="length" placeholder="Length"
            value="{{$selected_storage->length}}"> 
            <input type="text" class="form-control" name="width" placeholder="Width"
            value="{{$selected_storage->width}}"> 
            <input type="text" class="form-control" name="height" placeholder="Height"
            value="{{$selected_storage->height}}">
            <select class="bs-select form-control col-md-4" name="unit_id">
                <option></option>
                @if($units)
                @foreach($units as $unit)
                    <option value="{{$unit->id}}"
                    @if($unit->id == $selected_storage->unit_id)
                        selected="selected"
                    @endif
                    >{{$unit->name}}</option>
                @endforeach
                @endif
            </select> 
        </div>
    </div>
    <div class="form-group"></div>
    <h4 class="font-blue-ebonyclay">Number of shelfs</h4>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control"  
            name="shelfs" placeholder="0"
            value="{{$selected_storage->shelfs}}"> 
        </div>
    </div>
    <div class="form-group"></div>
    <h4 class="font-blue-ebonyclay">Max. capacity %</h4>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control"  
            name="max_capacity" placeholder="0"
            value="{{$selected_storage->max_capacity}}"> 
        </div>
    </div>
    <div class="form-group"></div>
    <h4 class="font-blue-ebonyclay"> Items</h4>
    <div class="col-md-9">
        <select multiple="multiple" class="multi-select" id="supplier_items_multi_select" name="storage_items[]">
        @if($items)
        @foreach($items as $item)
            <option value="{{$item->id}}" 
            @if(in_array($item->id, $selected_storage_items))
            selected
            @endif
            >
            {{$item->name}} </option>
        @endforeach
        @endif
        </select>
    </div>
     
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-5 col-md-9">
            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
        </div>
    </div>
</div>
</form>

</div>
@endif
@endsection