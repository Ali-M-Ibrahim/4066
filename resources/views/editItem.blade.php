@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Edit Item</h1>
        <form action="{{route("update-item",["id"=>$data->id])}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="name">Name</label>
                <input name="item_name" id="name" type="text" class="form-control" value="{{$data->name}}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="item_description" id="description"  class="form-control">{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input id="price" name="item_price" type="number" value="{{$data->price}}" class="form-control" />
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
                <a href="{{route("list-item")}}" class="btn btn-danger" > Back </a>
            </div>
        </form>
    </div>

@endsection
