<!DOCTYPE html>
<html lang="en">
<head>
     <title>Web Programming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @yield('custom-css')

    <style>
        .mt-1{
            margin-top: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Website</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{route("listItems")}}">Home</a></li>
            <li><a href="{{route("add-item")}}">add Item</a></li>
            @if(Auth::check())
                <li><a href="about.asp">Edit Information</a></li>
                <li><a href="{{route("logout")}}">Logout</a></li>
            @else
                <li><a href="{{route("login")}}">Login</a></li>
            @endif
        </ul>
    </div>
</nav>

@yield("screen-content")

@yield("content2")


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
