@extends('layouts.default.layout')
@section('content')

<!-- <h2 class="font-blue-ebonyclay"> Ingredients
</h2> -->
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<h2 class="font-blue-ebonyclay"> Menu items
</h2>
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
                    <a href="/ingredients/{{$item->id}}/edit" class="edit btn btn-circle green-turquoise" > Edit Ingredients</a>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>

<div id="add_ingredients"></div>

@endif
@endsection