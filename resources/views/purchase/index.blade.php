@extends('layouts.default.layout')
@section('content')

<h2 class="font-blue-ebonyclay"> Purchasing Restrictions
</h2>
<br>
@if(!$restaurant)
<span>Please set up a restauarnt first.</span>
@else
<h4 class="font-blue-ebonyclay"> Max purchasing budget constraint </h4>
@if($budget)
<form action="/purchase-restrictions/{{$budget->id}}" method="post">
<input type="hidden" name="_method" value="PUT">
@else
<form action="/purchase-restrictions" method="post">
@endif
{{csrf_field()}}
<input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
	<div class="form-group">
		<label class="mt-checkbox mt-checkbox-outline">
			<input type="checkbox" name="active"  value="1"
            @if($budget && $budget->active)
            checked="true"
            @endif
            >
			<span></span>
		</label>
		<div class="input-inline">
			<div class="col-md-8">
				<input type="text" class="form-control  spinner" placeholder="0.0" name="max_budget"
                 @if($budget && $budget->max_budget)
                    value={{$budget->max_budget}}
                 @endif
                required="" >
		    </div>
            <input type="submit" name="submit" value="Save" class="btn btn-circle green-turquoise">
		</div>
	</div>

</form>
<br>
<br>
<h4 class="font-blue-ebonyclay"> Purchasing period constraint, purchase every </h4>
    <div class="table-scrollable table-scrollable-borderless">
        <table class="table table-hover table-light" id="suppliers_purchase_period_table">
            <thead>
                <tr class="uppercase">
                    <th> Supplier </th>
                    <th> Purchase every </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($suppliers)
                @foreach($suppliers as $supplier)
                @foreach($supplier->restriction_period as $rp)
                <tr id="{{$rp->id}}">
                    <td> {{$supplier->name}} </td>
                    <td> {{$rp->period}} {{$rp->period_unit->name}} </td>
                    <td>
                        <a class="delete" href="javascript:;"> Delete </a>
                    </td>
                </tr>
                @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
<div class="portlet">
    <div class="portlet-body form">
        <div class="form-body">
            <div class="form-group">
            <form action="/supplier-purchase-period" method="post" class="mt-repeater form-horizontal">
            {{csrf_field()}}
                    <div data-repeater-list="group-a">
                        <div data-repeater-item class="mt-repeater-item">
                            <!-- jQuery Repeater Container -->
                            <div class="mt-repeater-input col-md-4">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input class="form-control form-control-inline" type="checkbox" name="active" value="1">
                                    <span></span>
                                </label>
                            </div>
                            <div class="mt-repeater-input  ">
	                            	<select class="form-control form-control-inline" name="supplier_id" required="">
	                            		<option></option>
                                        @if($suppliers)
                                        @foreach($suppliers as $supplier)
	                            		<option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                        @endif
	                            	</select>
                            </div>
                            <div class="mt-repeater-input ">
                                <input type="number" name="period" class="form-control form-control-inline" required="" /> 
                            </div>
                            <div class="mt-repeater-input  ">
	                            	<select class="form-control form-control-inline" name="unit_id" required="">
                                    @if($units)
                                    @foreach($units as $unit)
	                            		<option value="{{$unit->id}}">{{$unit->name}}</option>
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
                   <div class="row" style="margin-top: 18px;">
                        <div class="col-md-offset-0 col-md-9">
                            <button type="submit" class="btn btn-circle green-turquoise">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection