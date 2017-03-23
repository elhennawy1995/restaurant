@extends('layouts.default.layout')
@section('content')
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="dashboard-stat2 ">
		<div class="mt-radio-inline">
        <label class="mt-radio">
            <input type="radio" name="cards_options" id="cards_monthly" value="monthly" checked="" onclick="top_cards('monthly');"> Monthly
            <span></span>
        </label>
        <label class="mt-radio">
            <input type="radio" name="cards_options" id="cards_weekly" value="weekly"
            onclick="top_cards('weekly');"> Weekly
            <span></span>
        </label>
    </div>
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
	    <div class="mt-radio-inline">
        <label class="mt-radio">
            <input type="radio" name="forecast_options" id="forecast_monthly" value="monthly" checked="" onclick="sales_forecast('monthly');"> Monthly
            <span></span>
        </label>
        <label class="mt-radio">
            <input type="radio" name="forecast_options" id="forecast_weekly" value="weekly"
            onclick="sales_forecast('weekly');"> Weekly
            <span></span>
        </label>
    </div>
</div>
<div id="highchart_1" style="height:500px;"></div>
<br>
<br>
<br>
<br>
<h3 class="col-md-offset-4">Top selling items</h3>
<div class="row  col-md-4">
    <div class="mt-radio-inline">
        <label class="mt-radio">
            <input type="radio" name="optionsRadios" id="monthly_top_item_radio" value="monthly" checked="" onclick="top_items('monthly');"> Monthly
            <span></span>
        </label>
        <label class="mt-radio">
            <input type="radio" name="optionsRadios" id="weekly_top_item_radio" value="weekly"
            onclick="top_items('weekly');"> Weekly
            <span></span>
        </label>
    </div>
</div>
<br>
<div id="highchart_4" style="height:500px;"></div>
<br>
<br>
<br>
<br>
<h3 class="col-md-offset-4">Top selling items (percentage)</h3>
<div class="row  col-md-4">
    <div class="mt-radio-inline">
        <label class="mt-radio">
            <input type="radio" name="pie_radio" id="monthly_pie_items_radio" value="monthly" checked="" onclick="pie_items('monthly');"> Monthly
            <span></span>
        </label>
        <label class="mt-radio">
            <input type="radio" name="pie_radio" id="weekly_pie_items_radio" value="weekly"
            onclick="pie_items('weekly');"> Weekly
            <span></span>
        </label>
    </div>
</div>
<br>
<div id="pie_chart" ></div>
@endsection