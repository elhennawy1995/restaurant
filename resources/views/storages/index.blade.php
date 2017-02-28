@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Inventory
</h2>
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h3 class="font-blue-ebonyclay"> Storages
</h3>
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
                <td>  </td>
                <td>  </td>
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


<h2 class="font-blue-ebonyclay"> Add Storage</h2>
<form action="/storages" class="form-horizontal " method="POST">
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay">Name </h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Description</h3>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>  
    <h3 class="font-blue-ebonyclay">Storage size(dimensions)</h3>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="length" placeholder="Length"> 
            <input type="text" class="form-control" name="width" placeholder="Width"> 
            <input type="text" class="form-control" name="height" placeholder="Height">
            <select class="bs-select form-control col-md-4" name="unit_id">
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
    <h3 class="font-blue-ebonyclay">Number of shelfs</h3>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control"  
            name="shelfs" placeholder="0"> 
        </div>
    </div>
    <div class="form-group"></div>
    <h3 class="font-blue-ebonyclay">Max. capacity %</h3>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control"  
            name="max_capacity" placeholder="0"> 
        </div>
    </div>
    <div class="form-group"></div>
    <h3 class="font-blue-ebonyclay"> Items</h3>
    <div class="col-md-9">
        <select multiple="multiple" class="multi-select" id="supplier_items_multi_select" name="storage_items[]">
        @if($items)
        @foreach($items as $item)
        @if(!$item->supplier_id)
            <option value="{{$item->id}}" 
            >
            {{$item->name}} </option>
        @endif
        @endforeach
        @endif
        </select>
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