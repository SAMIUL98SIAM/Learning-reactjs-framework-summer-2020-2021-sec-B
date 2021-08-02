<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Dashboard', function () {
    return view('Dashboard');
}); 

// Route::get('/login', ['as'=>'login.index', 'uses'=>'LoginController@index']);
Route::get('/login',[LoginController::class,'index']);
Route::get('/logout',[LogoutController::class,'index']);
Route::post('/login',[LoginController::class,'verify']);


Route::group(  [ 'middleware'=>['sess'] ], function(){

        Route::get('/home',[HomeController::class,'index']);
        // Route::get('/user/list',[UserController::class,'index'])->name('user.index');
        Route::get('/User_List',[UserController::class,'index'])->name('user.index');
        // Route::get('/user/details/{id}',[UserController::class,'details'])->name('user.details');
        Route::get('/user/details/{id}',[UserController::class,'details'])->name('user.details');

        Route::group(  [ 'middleware'=>['type'] ], function(){
            Route::get('/user/create',[UserController::class,'create']);
            Route::post('/user/create',[UserController::class,'insert']);
            
            Route::get('/user/edit/{id}',[UserController::class,'edit']);
            Route::post('/user/edit/{id}',[UserController::class,'update']);

            Route::get('/user/delete/{id}', [UserController::class,'delete']);
            Route::post('/user/delete/{id}', [UserController::class,'destroy']);    

        });
        
});

// Route::get('/home',[HomeController::class,'index'])->middleware('sess');
// Route::get('/user/create',[UserController::class,'create'])->middleware('sess')

// Route::get('/user/delete/{id}', 'UserController@delete');
// Route::post('/user/delete/{id}', 'UserController@destroy');

//Route::get('/user/details/{id}', 'UserController@details');

/*Route::get('/register',function(){
    return "This is signup page";
});*/