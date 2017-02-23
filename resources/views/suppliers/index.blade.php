@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Suppliers
</h2>
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<div class="table-scrollable table-scrollable-borderless" id="suppliers_table">
    <table class="table table-hover table-light">
        <thead>
            <tr class="uppercase">
                <th> Name </th>
                <th> Address </th>
                <th> Description </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if($suppliers)
        @foreach($suppliers as $supplier)
            <tr id="{{$supplier->id}}">
                <td> {{$supplier->name}} </td>
                <td> {{$supplier->address}} </td>
                <td> {{$supplier->description}} </td>
                <td>
                    <a href="/suppliers/{{$supplier->id}}/edit" class="edit" href="javascript:;"> Edit </a>
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


<h2 class="font-blue-ebonyclay"> Add Supplier</h2>
<form action="suppliers" class="form-horizontal " method="post">
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay"> Name</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Address</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="address"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Description</h3>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Items</h3>
    <div class="col-md-9">
        <select multiple="multiple" class="multi-select" id="supplier_items_multi_select" name="supplier_items[]">
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

@endif

</div>
@endsection