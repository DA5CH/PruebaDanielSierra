@extends('layouts.app')
@section('content')
<div class = "container">
    <form action="{{url('/seguimientos')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('seguimientos.form');
    </form>
</div>
@endsection