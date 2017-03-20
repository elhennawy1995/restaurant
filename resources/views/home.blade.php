@extends('layouts.default.layout')
@section('content')
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="dashboard-stat2 ">
		<select class="bs-select form-control" id="cards_time_filter" >
			<option></option>
		    <option value="weekly">Weekly</option>
		    <option value="monthly" selected="">Monthly</option>
		</select> 
	</div>
</div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                        <span data-counter="counterup" data-value="" id="total_card_number">7800</span>
                        <small class="font-green-sharp">$</small>
                    </h3>
                    <small>TOTAL PROFIT</small>
                </div>
                <div class="icon">
                    <i class="icon-pie-chart"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="" id="top_seller_number">1349</span>
                    </h3>
                    
                    <small id="top_seller_name">Beef burger</small>
                </div>
                <div class="icon">
                    <i class="icon-like"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="" id="lowest_seller_number">12</span>
                    </h3>
                    <small id="lowest_seller_name">Salad</small>
                </div>
                <div class="icon">
                    <i class="icon-dislike"></i>
                </div>
            </div>

        </div>
    </div>
</div>
<h3 class="col-md-offset-4">Sales Forecast</h3>
<div class="row  col-md-4">
	<select class="bs-select form-control" id="line_chart_time_filter" >
		<option></option>
	    <option value="weekly">Weekly</option>
	    <option value="monthly" selected="">Monthly</option>
	</select> 
</div>
<div id="highchart_1" style="height:500px;"></div>
<br>
<h3 class="col-md-offset-4">Top selling items</h3>
<div class="row  col-md-4">
	<select class="bs-select form-control" id="line_chart_time_filter" >
		<option></option>
	    <option value="weekly">Weekly</option>
	    <option value="monthly" selected="">Monthly</option>
	</select> 
</div>
<br>
<div id="highchart_4" style="height:500px;"></div>

@endsection