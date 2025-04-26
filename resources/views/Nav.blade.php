<ul>
    <li><a href="default.asp">Home</a></li>
    <li><a href="news.asp">News</a></li>
    <li><a href="contact.asp">Contact</a></li>
    <li><a href="about.asp">About</a></li>
    @if(Auth::check())
        <li><a href="about.asp">Edit Information</a></li>
        <li><a href="{{route("logout")}}">Logout</a></li>
    @else
        <li><a href="{{route("login")}}">Login</a></li>
    @endif
</ul>
