@extends("layouts.app")

@section("screen-content")
    <div class="container">

        <form enctype="multipart/form-data" action="{{Route("saveImage")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="image">Image Link</label>
                <input type="file" name="image" class="form-control" id="image" />
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection
