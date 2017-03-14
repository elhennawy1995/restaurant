@extends('layouts.default.layout')
@section('content')

<h3 class="col-md-offset-4">Sales Forecast</h3>
<div class="row  col-md-4">
	<select class="bs-select form-control" id="line_chart_time_filter" >
		<option></option>
	    <option value="weekly">Weekly</option>
	    <option value="monthly">Monthly</option>
	</select> 
</div>
<div id="highchart_1" style="height:500px;"></div>
<br>
<h3>Top selling items</h3>
<div class="row  col-md-4">
	<select class="bs-select form-control" id="line_chart_time_filter" >
		<option></option>
	    <option value="weekly">Weekly</option>
	    <option value="monthly">Monthly</option>
	</select> 
</div>
<br>
<div id="highchart_4" style="height:500px;"></div>

@endsection