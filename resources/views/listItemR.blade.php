@extends("layouts.app")
@section('screen-content')
    <div class="container">
        <a href="{{route("customItem.create")}}" class="btn btn-success">+ Create</a>
        <table class="table table-stripped  table-bordered table-hover">
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
                        <a href="{{route("customItem.show",["customItem"=>$obj->id])}}" > show</a>


                        <form method="post" action="{{route("customItem.destroy",["customItem"=>$obj->id])}}">
                            @csrf
                            @method("delete")
                            <input value="delete" type="submit" class="btn btn-danger">
                        </form>

                        <a href="{{route("customItem.edit",["customItem"=>$obj->id])}}" > edit</a>

                    </td>
                </tr>
    @endforeach

@endsection
