@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>
@endsection

@section('customcss')
<style>
    h1{
        color: red !important;
    }
</style>
@endsection
