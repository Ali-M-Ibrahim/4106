@extends("layouts.app")

@section('screen-content')

    <div class="container">
        <h1>{{$message}}</h1>
        <table class="table table-stripped  table-bordered table-hover">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach($items as $obj)
                <tr>
                    <td>{{$obj->id}}</td>
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->description}}</td>
                    <td>{{$obj->price}}</td>
                    <td>
<a href="{{route("show-item",["id"=>$obj->id])}}">Show</a>
<a href="{{route("delete-item",["id"=>$obj->id])}}">Delete</a>

<form action="{{route("deleteitem",["id"=>$obj->id])}}" method="post">
@method("delete")
    @csrf
    <input type="submit" class="btn btn-danger" value="delete" />
</form>

   <a href="{{route("edit-item",["id"=>$obj->id])}}">Edit</a>

                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection



