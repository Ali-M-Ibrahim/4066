@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hello i am view user</h1>

        @if(Auth::check())
            <h1>The user is logged in </h1>
            <h1>The user name is {{Auth::user()->name}}  and email is:  {{Auth::user()->email}}</h1>
                <a href="{{route("logout")}}" class="btn btn-danger">Logout</a>
        @else
            <h1>The user is not logged in </h1>
            <a href="{{route("login")}}" class="btn btn-success">Login</a>

        @endif
    </div>

@endsection
