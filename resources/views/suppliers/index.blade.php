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
                    <a href="/suppliers/{{$supplier->id}}/edit" class="edit btn btn-circle green-turquoise" href="javascript:;"> Edit </a>
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


<h2 class="font-blue-ebonyclay"> Add Supplier</h2>
<form action="suppliers" class="form-horizontal " method="post">
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
<div class="form-body">	
    <h4 class="font-blue-ebonyclay"> Name</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="name" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Address</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="address" required=""> 
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Description</h4>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"></textarea>
        </div>
    </div>
    <h4 class="font-blue-ebonyclay"> Items</h4>
    <div class="form-group">
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

</div>
@endsection