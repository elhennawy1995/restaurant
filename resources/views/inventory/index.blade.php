@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Inventory
</h2>
<h3 class="font-blue-ebonyclay"> Items
</h3>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light">
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
            <tr>
                <td> Fries </td>
                <td> 3 Boxes </td>
                <td> Side </td>
                <td> $7 </td>
                <td>
                    <a class="edit" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete" href="javascript:;"> Delet </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Add Item</h2>
<form action="#" class="form-horizontal ">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay"> Item name</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="item_name"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Category</h3>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control">
                <option>Meat</option>
                <option>Sweet</option>
            </select>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Purchase Unit (PU)</h3>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control">
                <option>Pack</option>
                <option>Oz</option>
            </select>
        </div>
    </div>
    <h3>Purchase Unit Price (PUP)</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="">
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Inventory Count Unit (CU)</h3>
    <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control">
                <option>Bottles</option>
                <option>Cans</option>
            </select>
        </div>
    </div>
    <h3>Number of Count Units per Purchase Unit (# of CU per PU)</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="">
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Description</h3>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>    
    <h3 class="font-blue-ebonyclay">Inventory Count Unit size(dimensions)</h3>
    <div class="form-inline" >
        <div class="form-group col-md-12">
            <input type="text" class="form-control" id="length" placeholder="Length"> 
            <input type="text" class="form-control" id="width" placeholder="Width"> 
            <input type="text" class="form-control" id="height" placeholder="Height">
            <select class="bs-select form-control col-md-4">
                <option>Inch</option>
                <option>Cm.</option>
            </select> 
        </div>
    </div>
    <div class="form-group"></div>
    <h3 class="font-blue-ebonyclay">Estimated remaining shelf life</h3>
    <div class="form-inline col-md-8" >
        <div class="form-group">
            <input type="text" class="form-control" id="ersl" placeholder="0"> 
            <select class="bs-select form-control col-md-4">
                <option>Days</option>
                <option>Months</option>
                <option>Years</option>
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
@endsection