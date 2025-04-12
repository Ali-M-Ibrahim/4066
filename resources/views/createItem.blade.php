@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add new Item</h1>
        <form action="{{route("store-item")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{old("item_name")}}"  name="item_name" id="name" type="text" class="form-control" />
                 @error("item_name")
                   <div class="alert alert-danger mt-1">{{$message}}</div>
                  @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea  name="item_description" id="description"  class="form-control">{{old("item_description")}}</textarea>
                @error("item_description")
                <div class="alert alert-danger mt-1">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input value="{{old("item_price")}}"   id="price" name="item_price" type="number" class="form-control" />
                @error("item_price")
                <div class="alert alert-danger mt-1">{{$message}}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="price">Price Confirmation</label>
                <input value="{{old("item_price_confirmation")}}" id="price" name="item_price_confirmation" type="number" class="form-control" />
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
                <a href="{{route("list-item")}}" class="btn btn-danger" > Back </a>
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
