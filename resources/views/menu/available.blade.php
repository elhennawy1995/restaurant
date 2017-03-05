@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<!-- <h2 class="font-blue-ebonyclay"> Menu
</h2> -->
@if(!$restaurant)
    <span>Please set up a restaurant first.</span>
@else

<!-- @if($items)
<ul>
    @foreach($items as $item)
        @if(isset($item['unavailable']))
            <li> <strike>{{$item['name']}}</strike></li>
        @else
            <li> {{$item['name']}} </li>
        @endif
    @endforeach
<ul>
@endif -->
@if($result)
    @foreach($result as $type=>$items)
    <div>
    <h4>{{$type}}</h4>
    <div class="row">
        @foreach($items as $type=>$item)
            @if(isset($item['unavailable']))
                <!-- <li> <strike>{{$item['name']}}</strike></li> -->
            @else
                <!-- <li> {{$item['name']}} </li> -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 " style="background: #e7ecf1 !important;">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="
                                            {{$item['price']}}">{{$item['price']}}</span>
                                            <small class="font-green-sharp">$</small>
                                        </h3>
                                        <small>{{$item['name']}}</small>
                                    </div>
                                   <!--  <div class="icon">
                                        <i class="icon-pie-chart"></i>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            @endif
        @endforeach
    </div>

    @endforeach
@endif

    

@endif
</div>
@endsection