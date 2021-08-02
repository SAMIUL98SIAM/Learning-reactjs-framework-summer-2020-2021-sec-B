<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User ;
class UserController extends Controller
{

    
   

    public function index(){
        //$users = $this->users ;
        // $users = DB::table('user_table')->get();
        $users = User::all() ;
        return view('user.list')->with('userList', $users);
    }

    public function details($id){
        //$users = $this->users;
    //     $users = $this->getUserList() ;
    //     $user = '';
    //     foreach($users as $u){
    //         if($u['id'] == $id){
    //             $user = $u;
    //             break;
    //         }
    //     }
    //     return view('user.details')->with('user', $user);
    // }

    
      $user = User::find($id);
        return view('user.details')->with('user', $user);
    }
    public function create(){
        return view('user.create');}
    
         
        public function insert(Request $req)
        {
            if($req->hasFile('image')){
        
                $file = $req->file('image');
                echo "File Name: ".$file->getClientOriginalName()."<br>";
                echo "File Extension: ".$file->getClientOriginalExtension()."<br>";
                echo "File Mime Type: ".$file->getMimeType()."<br>";
                echo "File Size: ".$file->getSize()."<br>";
    
                if($file->move('upload', 'abc.'.$file->getClientOriginalExtension())){
                    echo "success";
                }else{
                    echo "error";
                }
            }
            $user = new User;
            $user->username = $req->username;
            $user->password = $req->password;
            $user->name = $req->name;
            $user->dept = $req->dept;
            $user->cgpa = '4';
            $user->type = 'user';
            $user->profile_img = '';
            $user->save();
            return redirect()->route('user.index');


        //     $users = $this->getUserList();
        //     $user = ['id'=>$req->id, 'uname'=>$req->uname, 'email'=>$req->email];
        //     array_push($users,$user);
        //     return view('user.list')->with('userList', $users);
        }

    // public function insert(Request $req){
    //     $users = $this->usesr;
    //     $user = ['id'=>$req->id, 'name'=>$req->uname, 'email'=>$req->email];
    //     array_push($users, $user);
    //     return view('user.list')->with('user', $users);
    // }

    // public $users = [
    //     ['id' => 1, 'name' => 'Samiul', 'email' => 'samiul02@gmail.com'],
    //     ['id' => 2, 'name' => 'Mumu', 'email' => 'mumu02@gmail.com'],
    //     ['id' => 3, 'name' => 'Siam', 'email' => 'siam@gmail.com'],
    // ];




    public function edit($id){
        //find user by id from user list $user
        // $users = $this->users;
        // $users = $this->getUserList() ;
        // $user = '';
        // foreach($users as $u){
        //     if($u['id'] == $id){
        //         $user = $u;
        //         break;
        //     }
        // }
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $req, $id){
        //craete new user array & add to list
        // $users = $this->users;
       
        // for($i = 0; $i < count($users) ; $i++){
        //     if($this->users[$i]['id'] == $id){
        //         $this->users[$i]['name'] = $req -> name;
        //         $this->users[$i]['email'] = $req -> email;
        //         break;
        //     }
        // }
        //new userList

        // return view('user.list')->with('userList', $this->users);
        // return view('user.list')->with('userList', $users);

        // $users = $this->getUserList() ;
        //  for($i = 0; $i < count($users) ; $i++){
        //     if($users[$i]['id'] == $id){
        //         $users[$i]['uname'] = $req -> name;
        //         $users[$i]['email'] = $req -> email;
        //         break;
        //     }
        // }         
        // return view('user.list')->with('userList', $this->users);
        // return view('user.list')->with('userList', $users);
        $user = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->name = $req->name;
        $user->type = $req->type;
        $user->save();
        return redirect()->route('user.index');
    }

    public function delete( $id){
        //confirm window
        //find user by id $user
        // $users = $this->users;
        // $users = $this->getUserList() ;
        // $user = '';
        // foreach($users as $u){
        //     if($u['id'] == $id){
        //         $user = $u;
        //         break;
        //     }
        // }
        // //return redirect()->route('user.index');
        // return view('user.delete')->with('user', $user);
        $user= User::find($id);
        return view('user.delete')->with('user', $user);
    }

    public function destroy($id){
        //remove user form list
        //create new list & display
        // $users = $this->users;
        // $users = $this->getUserList() ;
        // for($i = 0; $i < count($users) ; $i++){
        //     if($this->users[$i]['id'] == $id){
        //         unset($this->users[$i]);
        //         break;
        //     }
        // }

        // return view('user.list')->with('userList', $users);
        User::destroy($id);
        return redirect()->route('user.index');
    }

    public function getUserList(){
        return [
            ['id'=>1, 'uname'=>'almain', 'email'=>'email@email.com'],
            ['id'=>2, 'uname'=>'abc', 'email'=>'abc@email.com'],
            ['id'=>3, 'uname'=>'xyz', 'email'=>'xyz@email.com']
        ];
    }
    
}