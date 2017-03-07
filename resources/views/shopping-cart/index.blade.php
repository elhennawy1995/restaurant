@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<!-- <h2 class="font-blue-ebonyclay"> Inventory
</h2> -->
@if(!$restaurant)
    <span>Please set up a restaurant first.</span>
@else
    <h4 class="font-blue-ebonyclay"> Shopping Items
    </h4>
    <!-- <ul> -->
    @if($percentage)
        @foreach($percentage as $p)
            @if($p['percentage'] > 70)
                <div><i class="fa fa-circle-o"></i> {{$p['inventory_item_name']}}</div>
            @endif
        @endforeach
    @endif
    <!-- </ul> -->
    

@endif
</div>
@endsection