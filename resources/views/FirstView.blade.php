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

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

@include("Nav")

<ul>
    @for($i=0;$i<10;$i++)
        @if($i==5)
{{--            @continue--}}
        @break
            <li>element number 5</li>
        @else
            <li>{{ $i }}</li>
        @endif

    @endfor
</ul>

<p>{{$cdata}}</p>

</body>
</html>

