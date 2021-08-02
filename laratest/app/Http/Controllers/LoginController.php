<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserRequest;
use App\Models\User ;


class LoginController extends Controller
{
    public function index()
    {
        //echo "";
        return view('login.index');
    }

    public function verify(UserRequest $req)
    {
         
        // $req->session()->put('uname', 'abc');
        // $req->session()->put('password', '1234');

        // $uname = $req->session()->get('uname');
        // $alldata = $req->session()->all();

        // $req->session()->forget('password');
        // $req->session()->flush();
        // $uname = $req->session()->pull('uname');
        // $req->session()->has('uname');

        // $req->session()->flash('cgpa', '4');
        // $req->session()->flash('dept', 'SE');
        // $cgpa = $req->session()->get('cgpa');
        // $req->session()->keep('cgpa');
        // $req->session()->reflash();

    	// $validation = Validator::make($req->all(), [
    	// 	'uname' => 'required',
    	// 	'password'=> 'required'
    	// ]);

    	// if($validation->fails()){
    	// 	return redirect()->route('login.index')->with('errors', $validation->errors());
    	// }
        // $req->validate(
        //     [
        //         'uname' => 'required',
    	//      	'password'=> 'required|min:5'
        //     ]
        // )->validate();
        // $this->validate($req,
        //     [
        //         'uname' => 'required',
    	//      	'password'=> 'required|min:5'
        //     ]
        // )->validate();
      

        /*Accept all version*/
        $validation = Validator::make($req->all(), [
    		'username' => 'required',
    		'password'=> 'required|min:5'
    	]);

    	if($validation->fails()){
             return back()
                       ->with('errors',$validation->errors())
                       ->withInput();              
    		//return redirect()->route('login.index')->with('errors', $validation->errors());
    	}
        /*Accept all version*/
        $user = User::where('username',$req->username)
             ->where('password',$req->password) 
             ->first();         
        // $results = User::all();
        // print_r($results);
        // if(count($user)>0)
        // if($req->username == $req->password)
        if(count((array)$user) > 0){
            $req->session()->put('username', $req->username);
            return redirect('/home');
        }else{
            $req->session()->flash('msg', 'invaild username or password');
            return redirect('/login');
        }
    }
    
}
