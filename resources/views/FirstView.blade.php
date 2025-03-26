<!DOCTYPE html>
<html>
<head>
    <style>
        body {background-color: powderblue;}
        h1   {color: blue;}
        p    {color: red;}
    </style>
</head>
<body>

@include("nav")

<h1>This is a heading</h1>


@if(true)
<p>This is a paragraph.</p>
@endif
<ul>
    @for($i=0;$i<10;$i++)
        @if($i==3)
{{--            @continue--}}
{{--            @break--}}
        @else
            <li>{{$i}}</li>
        @endif
    @endfor

</ul>


<p>{{ $greet }}</p>
<p>{{ $msg }}</p>
@isset($data1)
<p>{{ $data1 }}</p>
@endisset
@isset($data2)
<p>{{ $data2 }}</p>
@endisset
</body>
</html>

