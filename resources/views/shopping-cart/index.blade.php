@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> Inventory
</h2>
@if(!$restaurant)
    <span>Please set up a restaurant first.</span>
@else
    <h3 class="font-blue-ebonyclay"> Shopping Items
    </h3>
    <ul>
    @if($percentage)
        @foreach($percentage as $p)
            @if($p['percentage'] > 70)
                <li>{{$p['inventory_item_name']}}</li>
            @endif
        @endforeach
    @endif
    </ul>
    

@endif
</div>
@endsection