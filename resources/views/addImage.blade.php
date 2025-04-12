@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add new Item</h1>
        <form enctype="multipart/form-data" method="post" action="{{route("addImage")}}">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
{{--                <input  id="image" name="image" type="text" class="form-control" />--}}
             <input  id="image" name="image" type="file" class="form-control" accept="image/png" />
@error("image")
                {{$message}}
                @enderror
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
            </div>
        </form>

@endsection
