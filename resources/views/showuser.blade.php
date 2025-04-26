@extends("layouts.app")
@section("screen-content")
    <div class="container">

        @if(Auth::check())
           <p>User name is: {{Auth::user()->name}}</p>
            <p>User id is: {{Auth::user()->id}}</p>
            <p>User email is: {{Auth::user()->email}}</p>
            <a href="{{route("logout")}}" class="btn btn-danger">Logout</a>
        @else
            <a href="{{route("login")}}" class="btn btn-danger">Login</a>
`        @endif

    </div>
@endsection
