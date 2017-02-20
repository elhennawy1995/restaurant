@extends('layouts.default.layout')
@section('content')

<h2 class="font-blue-ebonyclay"> Purchasing Restrictions
</h2>
<h3 class="font-blue-ebonyclay"> Max purchasing budget constraint </h3>
<form>
	<div class="form-group">
		<label class="mt-checkbox mt-checkbox-outline">
			<input type="checkbox">
			<span></span>
		</label>
		<div class="input-inline">
			<div class="col-md-8">
				<input type="text" class="form-control  spinner" placeholder="0.0" name="">
		    </div>
		</div>
	</div>
</form>
<h3 class="font-blue-ebonyclay"> Purchasing period constraint, purchase every </h3>
<div class="portlet">
    <div class="portlet-body form">
        <div class="form-body">
            <div class="form-group">
                <form action="#" class="mt-repeater form-horizontal">
                    <div data-repeater-list="group-a">
                        <div data-repeater-item class="mt-repeater-item">
                            <!-- jQuery Repeater Container -->
                            <div class="mt-repeater-input col-md-4">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input class="form-control form-control-inline" type="checkbox" id="" value="">
                                    <span></span>
                                </label>
                            </div>
                            <div class="mt-repeater-input  ">
	                            	<select class="form-control form-control-inline">
	                            		<option></option>
	                            		<option>ALex</option>
	                            		<option>Veg</option>
	                            	</select>
                            </div>
                            <div class="mt-repeater-input ">
                                <input type="number" name="text-input" class="form-control form-control-inline" value="" /> 
                            </div>
                            <div class="mt-repeater-input  ">
	                            	<select class="form-control form-control-inline">
	                            		<option>Days</option>
	                            		<option>Months</option>
	                            		<option>Years</option>
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
            </div>
        </div>
    </div>
</div>

@endsection