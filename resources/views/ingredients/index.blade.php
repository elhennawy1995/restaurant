@extends('layouts.default.layout')
@section('content')

<h2 class="font-blue-ebonyclay"> Ingredients
</h2>
<h3 class="font-blue-ebonyclay"> Menu items
</h3>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Fries </td>
                <td>
                    <a class="edit" href="javascript:;"> Edit </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Add ingredients</h2>
<div class="portlet">	
    <h3 class="font-blue-ebonyclay"> Selected Item</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" value="Fries" class="form-control spinner" name="item_name" disabled> 
        </div>
    </div>
    <br>
    <h3 class="font-blue-ebonyclay"> Ingredients</h3>
    <div class="table-scrollable table-scrollable-borderless">
        <table class="table table-hover table-light">
            <thead>
                <tr class="uppercase">
                    <th> Item Name </th>
                    <th> Units </th>
                    <th> Amount </th>
                    <th> Count Unit </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Salt </td>
                    <td> Spoon </td>
                    <td> 14 </td>
                    <td> grams </td>
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
</div>
        <h3 class="font-blue-ebonyclay"> Select ingredients </h3>
                    <form action="#" class="mt-repeater form-horizontal">
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <!-- jQuery Repeater Container -->
                                <div class="mt-repeater-input">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input class="form-control " type="checkbox" id="" value="">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="mt-repeater-input">
                                       <div class="form-group">
                                                <div class="">
                                                    <select class="bs-select form-control">
                                                        <optgroup label="Picnic">
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                        </optgroup>
                                                        <optgroup label="Camping">
                                                            <option>Tent</option>
                                                            <option>Flashlight</option>
                                                            <option>Toilet Paper</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                </div>
                                <div class="mt-repeater-input ">
                                    <input type="number" name="text-input" class="form-control form-control-inline col-md-4" value="" placeholder="Amount" /> 
                                </div>
                                <div class="mt-repeater-input  ">
                                        <select class="form-control">
                                            <option>Cups</option>
                                            <option>Spoons</option>
                                        </select>
                                </div>
                                <div class="mt-repeater-input">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" style="margin-top: 0;">
                                        <i class="fa fa-close"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                            <i class="fa fa-plus"></i> Add</a>
                    </form>
    <br>
    <div class="form-actions">
        <div class="row">
            <div class=" col-md-9">
                <button type="submit" class="btn btn-lg btn-circle green">Save</button>
            </div>
        </div>
    </div>
@endsection