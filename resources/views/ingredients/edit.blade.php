@extends('layouts.default.layout')
@section('content')

<!-- <h2 class="font-blue-ebonyclay"> Ingredients
</h2> -->
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h4 class="font-blue-ebonyclay"> Menu items
</h4>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light" id="items_table">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if($items)
        @foreach($items as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $item->name }} </td>
                <td>
                    <a href="/ingredients/{{$item->id}}/edit" class="edit"> Edit </a>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>

<div id="add_ingredients">
    <!-- <h2 class="font-blue-ebonyclay">ingredients</h2> -->
<div class="portlet">   
    <h4 class="font-blue-ebonyclay"> Selected Item</h4>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" value="{{$selected_item->name}}" class="form-control spinner" name="item_name" disabled> 
        </div>
    </div>
    <div></div></br>
    <div></div></br>
    <h4 class="font-blue-ebonyclay"> Ingredients</h4>
    <div class="table-scrollable table-scrollable-borderless">
        <table class="table table-hover table-light" id="ingredient_items_table">
            <thead>
                <tr class="uppercase">
                    <th> Ingredient </th>
                    <th> Ingredient Units </th>
                    <th> Amount </th>
                    <th> Count Unit </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($ingredients)
                @foreach($ingredients as $ingredient)
                <tr id="{{$ingredient->id}}">
                    <td> {{$ingredient->inventory_item->name}} </td>
                    <td> {{$ingredient->unit->name}} </td>
                    <td> {{$ingredient->amount}} </td>
                    <td> {{$ingredient->count_unit->name}} </td>
                    <td>
                        <a class="delete" href="javascript:;"> Delete </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<h4 class="font-blue-ebonyclay"> Select ingredients </h4>
    <form action="/ingredients" class=" form-horizontal" method="post">
    {{csrf_field()}}
         <input class="mt-repeater-input form-control " type="hidden" name="menu_item_id" value="{{$selected_item->id}}">
    <div class="mt-repeater">
            <div data-repeater-list="group-a">
                <div data-repeater-item class="mt-repeater-item">
                    <!-- jQuery Repeater Container -->
                    <!-- <div class="mt-repeater-input">
                        <label class="mt-checkbox mt-checkbox-outline">
                            <input class="form-control " type="checkbox" id="" value="">
                            <span></span>
                        </label>
                    </div> -->                    
                    <div class="mt-repeater-input">
                           <div class="form-group">
                                    <div class="">
                                        <select class=" form-control" 
                                        name="inventory_item_id">
                                        @if($inventory_items)
                                            <optgroup label="inventory">
                                                @foreach($inventory_items as $inventory_item)
                                                    <option value="{{$inventory_item->id}}">
                                                        {{$inventory_item->name}}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                    </div>
                    <div class="mt-repeater-input ">
                        <input type="number" name="amount" class="form-control form-control-inline col-md-4" value="" placeholder="Amount" /> 
                    </div>
                    <div class="mt-repeater-input  ">
                            <select class="form-control" name="unit_id">
                                @if($units)
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}" required>{{$unit->name}}</option>
                                @endforeach
                                @endif
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
        </div>
    
    <br>
    <div class="form-actions" style="margin-top: 8px;">
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