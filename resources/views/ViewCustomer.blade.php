<h1>Customer information:</h1>
@isset($data)
<p>Id is: {{$data->id}}</p>
<p>Name is: {{$data->name}}</p>
<p>address is: {{$data->address}}</p>
@endisset
