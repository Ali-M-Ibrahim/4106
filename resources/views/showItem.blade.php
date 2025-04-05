@extends("layouts.app")


@section('screen-content')
<div class="container">

    <h1>Item information are:</h1>
    <h5>Name is : {{$item->name}}</h5>
    <h5>Price is : {{$item->price}}</h5>
    <h5>Description is : {{$item->description}}</h5>

    <a href="{{route("listItems")}}" class="btn btn-danger">Back</a>
</div>

@endsection
