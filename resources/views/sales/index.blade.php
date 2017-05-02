@extends('layouts.default.layout')
@section('content')
<h3>Uploade sales data</h3>
<form action='/sales/import-data' class='form-horizontal' method='post' enctype="multipart/form-data">
{{csrf_field()}}
<input type='file' name='csv' required="" /></br>
<button type='submit' class='btn btn-circle green-turquoise'>Uploade</button>
</form>
@endsection