@extends("layouts.app")

@section("screen-content")
    <div class="container">

        <form action="{{route("customItem.update",["customItem"=>$item->id])}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" value="{{$item->name}}" type="text" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{$item->description}} </textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input value="{{$item->price}}" name="price" type="number" id="price" class="form-control">
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success">
                <a href="{{route("customItem.index")}}" class="btn btn-info">Cancel</a>
            </div>
        </form>
    </div>
@endsection
