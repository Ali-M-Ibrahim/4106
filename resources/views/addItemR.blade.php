@extends("layouts.app")

@section("screen-content")
    <div class="container">

        <form action="{{Route("customItem.store")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"> </textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" type="number" id="price" class="form-control">
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success">
                <a href="{{route("customItem.index")}}" class="btn btn-info">Cancel</a>
            </div>
        </form>
    </div>
@endsection
