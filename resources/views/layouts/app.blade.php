<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @yield('customcss')
    <style>
        .mt-1{
            margin-top: 10px;
        }
    </style>
</head>
<body>

@include("nav")

@yield("content")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
