@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>The item name is: {{$data->name}}</h1>
        <h1>The item description is: {{$data->description}}</h1>
        <h1>The item price is: {{$data->price}}</h1>
    </div>
@endsection
