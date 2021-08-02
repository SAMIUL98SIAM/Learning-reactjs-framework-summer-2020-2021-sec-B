@extends('../navbar')

	@section('navbar')
		<a href="/home"> Back</a> |
		<a href="/logout"> Logout </a> 
	@endsection

	@section('title')
	:: List ::
	@endsection

	@section('page_title')
	User Lists
	@endsection

	@section('main_content')
    

    <table border="1">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Email </td>
            <td> Type </td>
            <td> Action </td>
        </tr>
    
    @foreach ($userList as $user) 
        <tr>
            <td>{{$user['user_id']}}</td>
            <td>{{$user['username']}}</td>
            <td>{{$user['password']}}</td>
            <td>{{$user['type']}}</td>  
            <td>
               <a href="/user/details/{{$user['user_id']}}"> Details </a>|
                <!-- <a href="/{{route('user.index')}}">Details </a>| -->
                <a href="/user/edit/{{$user['user_id']}}"> Edit </a> |
                <a href="/user/delete/{{$user['user_id']}}"> Delete </a> |
            </td>
        </tr>
    @endforeach  
    </table>
@endsection
