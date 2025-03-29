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

<h1>{{ $tit }}</h1>
<p>{{ $msg }}</p>

<p>{{ $cdata }}</p>


@isset($msg2)
<p>{{ $msg2 }}</p>
@endisset


</body>
</html>

