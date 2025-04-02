@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">List of items
            <a href="{{route("myitem.create")}}"> + Create</a>

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
                        <a href="{{route("myitem.show",["myitem"=>$obj->id])}}" >Show</a>

                        <form action="{{route("myitem.destroy",["myitem"=>$obj->id])}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>

                        <a href="{{route("myitem.edit",["myitem"=>$obj->id])}}" >Edit</a>



                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection
