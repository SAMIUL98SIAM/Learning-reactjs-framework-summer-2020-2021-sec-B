@extends('../navbar')

@section('title')
:: Home page :: 
@endsection

@section('page_title')
 -- Home page --
@endsection

@section('main_content')
{{-- main content --}}
        <h1>Welcome home, {{session('username')}} :: {{$id}}</h1>
        <img src="{{asset('upload/abc.png')}}" height="100px" width="100px"/>
        <a href="/user/create"> Create New </a>|
        <!--<a href="/user/list"> User List </a>-->| 
        <a href="{{route('user.index')}}">User List</a>|
        <a href="/logout"> Logout </a>
@endsection