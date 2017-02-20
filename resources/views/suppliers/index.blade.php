@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Suppliers
</h2>
<div class="table-scrollable table-scrollable-borderless">
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
            <tr>
                <td> Adam </td>
                <td> 13 Work st. </td>
                <td> Provides vegetables </td>
                <td>
                    <a class="edit" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete" href="javascript:;"> Delete </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Add Supplier</h2>
<form action="#" class="form-horizontal ">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay"> Name</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="supplier_name"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Address</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="address_name"> 
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
            <option>Dallas Cowboys</option>
            <option>New York Giants</option>
            <option selected>Philadelphia Eagles</option>
            <option selected>Washington Redskins</option>
            <option>Chicago Bears</option>
            <option>Detroit Lions</option>
            <option>Green Bay Packers</option>
            <option>Minnesota Vikings</option>
            <option selected>Atlanta Falcons</option>
            <option>Carolina Panthers</option>
            <option>New Orleans Saints</option>
            <option>Tampa Bay Buccaneers</option>
            <option>Arizona Cardinals</option>
            <option>St. Louis Rams</option>
            <option>San Francisco 49ers</option>
            <option>Seattle Seahawks</option>
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
@endsection