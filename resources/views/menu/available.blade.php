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
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 " style="background: #e7ecf1 !important;">
                                <div class="display" style="margin-bottom: 0px !important">
                                    <div class="row">
                                        <div class="number col-md-offset-1">
                                        <span style="color:red" >We are out.</span>
                                            <h3 class="font-green-sharp" style="margin-top: 17px">
                                                <span data-counter="counterup" data-value="
                                                {{$item['price']}}">{{$item['price']}}</span>
                                                <small class="font-green-sharp">$</small>
                                            </h3>
                                            <small>{{$item['name']}}</small>
                                        </div>
                                        <div class="icon col-sm-5 " >
                                            <!-- <i class="icon-pie-chart"></i> -->
                                            <img src=
                                            @if(!empty($item['photo']))
                                            "{{end($item['photo'])['path']}}"
                                            @endif
                                            width="100" height="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div
            @else
                <!-- <li> {{$item['name']}} </li> -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 " style="background: #e7ecf1 !important;">
                                <div class="display" style="margin-bottom: 0px !important">
                                    <div class="row">
                                        <div class="number col-md-offset-1">
                                            <h3 class="font-green-sharp" style="margin-top: 17px">
                                                <span data-counter="counterup" data-value="
                                                {{$item['price']}}">{{$item['price']}}</span>
                                                <small class="font-green-sharp">$</small>
                                            </h3>
                                            <small>{{$item['name']}}</small>
                                        </div>
                                        <div class="icon col-sm-5 " >
                                            <!-- <i class="icon-pie-chart"></i> -->
                                            <img src=
                                            @if(!empty($item['photo']))
                                            "{{end($item['photo'])['path']}}"
                                            @endif
                                            width="100" height="100">
                                        </div>
                                    </div>
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