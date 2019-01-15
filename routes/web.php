<?php

// use Faker\Provider\Address;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Address;
use App\User;


Route::get('/insert',function(){
    $user = User::findOrFail(1);
    $address = new Address(['name'=>'Urlabari, Morang']);
    $user->address()->save($address);
});

Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();
    $address->name = 'Bhaktapur';
    $address->save();
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/show', function(){
    $user = User::find(1);
    return $user->address->name;
});

Route::get('/delete', function(){
    $all = User::find(1)->name;
    if(count($all)>0){
        return 'There are some namessssssssssss';
    }
    else{
        return 'No any Addresses';
    }
});