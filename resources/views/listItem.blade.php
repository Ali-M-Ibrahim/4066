@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">List of items
            <a href="{{route("create-item")}}"> + Create</a>

        </h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach($data as $obj)
                <tr>
                    <td>{{$obj->id}}</td>
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->description}}</td>
                    <td>{{$obj->price}}</td>
                    <td>
                        <a href="{{route("show-item",["id"=>$obj->id])}}" >Show</a>
                        <a href="{{route("delete-item",["id"=>$obj->id])}}" >Delete</a>

                        <form action="{{route("delete-item2",["id"=>$obj->id])}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>

                        <a href="{{route("edit-item",["id"=>$obj->id])}}" >Edit</a>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection
