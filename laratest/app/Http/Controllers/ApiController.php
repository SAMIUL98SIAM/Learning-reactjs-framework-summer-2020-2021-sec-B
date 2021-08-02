<?php

namespace App\Http\Controllers;
use App\Models\User ;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function user()
    {
        $user = User::get();
        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $user  = User::find($id);
        $user->forceDelete();
        return response(200);
    }

    public function edit($id)
    {
        $user  = User::find($id);
        return response()->json($user, 200);
    }

    public function editUser(Request $req, $id)
    {
        $user  = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->save();
        return response()->json($user, 200);
    }

    public function create(Request $req)
    {
        $user  = new User;
        $user->username = $req->username;
        //$user->password = $req->password;
        //$user->type = $req->type;
        $user->password = $req->password;
        $user->save();
        return response()->json($user, 200);
    }
}
