@extends('layouts.default.layout')
@section('content')
<div class="portlet m-grid m-grid-full-height">
<h2 class="font-blue-ebonyclay"> 
</h2>
@if(!$restaurant)
<span>Please set up a restaurant first.</span>
@else
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light" id="inventory_items_table">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th> Category </th>
                <th> Units </th>
                <th>  </th>
            </tr>
        </thead>
        <tbody>
        @if($items)
        @foreach($items as $item)
            <tr id={{$item->id }}>
                <td> {{$item->name }}</td>
                <td> {{$item->category->name}} </td>
                <td>  <input type="text" id="{{$item->id}}-value" value="{{$item->pu_count }}"> {{$item->purchase_unit->name}} </td>
                <td>  <button class="btn btn-circle green-turquoise" onclick="updateStock({{$item->id }})"> Update </button> </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function updateStock(id)
    {
        value = $('#'+id+"-value").val();
        $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        $.ajax(
                {
                    url:"/inventory/"+id,
                    type:"PUT",
                    data:{"pu_count":value}
                }
            ).done(function(data){
                    console.log(data);
            });
    }
</script>
@endif
@endsection