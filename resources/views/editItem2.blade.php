@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Edit Item</h1>
        <form action="{{route("myitem.update",["myitem"=>$data->id])}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$data->name}}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"  class="form-control">{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input id="price" name="price" type="number" value="{{$data->price}}" class="form-control" />
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
                <a href="{{route("myitem.index")}}" class="btn btn-danger" > Back </a>
            </div>
        </form>
    </div>

@endsection
