@extends("layouts.app")
@section("screen-content")
    <div class="container">

        <h1>Login</h1>
        <form action="{{route("authenticate")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" />
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
            </div>

            @error("email")
            <div class="alert alert-danger">
                 {{$message}}
            </div>
            @enderror
        </form>
    </div>
@endsection
