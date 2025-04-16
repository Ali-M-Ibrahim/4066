@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Login</h1>
        <form action="{{route("dologin")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{old("email")}}"  name="email" id="email" type="text" class="form-control" />
                @error("email")
                <div class="alert alert-danger mt-1">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input value="{{old("password")}}"  name="password" id="password" type="password" class="form-control" />
                @error("password")
                <div class="alert alert-danger mt-1">{{$message}}</div>
                @enderror
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
