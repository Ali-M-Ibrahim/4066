<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h1>List of customers</h1>
<table>


<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Address</th>
</tr>

@foreach($data as $obj)
    <tr>
        <td>{{$obj->id}}</td>
        <td>{{$obj->name}}</td>
        <td>{{$obj->address}}</td>
    </tr>

@endforeach
</table>
</body>
