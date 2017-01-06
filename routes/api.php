<?php

use Illuminate\Http\Request;

//Models
use App\User; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/clients', function () {
    //placeholder stub, for development purposes
    $clients = 
        array(
            array("name" => "Ruth Owen"),
            array("name" => "Jonah Johnston"),
            array("name" => "Meagan Blair"),
            array("name" => "Lane Burke"),
            array("name" => "Perry Cross") 
        );
    
    return $clients;

});


//simple route to determine is specified User ID is Admin
Route::get('/users/admin/{id}', function($id){
    
    $user = new App\User;
    
    $user = $user->find($id);
    
    $result = $user->isAdmin();

    return $result;

});

//Total Number of Encounters
Route::get('num-encounters', function(){
    $encounters = App\Encounter::count();

    return $encounters;

});

//Total Number of Actions
Route::get('num-encounters', function(){
    $encounters = App\Encounter::count();

    return $encounters;

});

//Total Number of Clients
Route::get('num-encounters', function(){
    $encounters = App\Encounter::count();

    return $encounters;

});

//Total Time Spent (Minutes)
Route::get('duration', function(){
    $duration = App\Encounter::all()->sum('duration');

    return $duration;

});

//simple raw getters for DB/API development
Route::get('/clients', function(){
    
    $clients = App\Client::all();

    return $clients;


});

Route::get('/actions', function(){
    
    $actions = App\Action::all();

    return $actions;


});

Route::get('/types', function(){
    
    $types = App\Type::all();

    return $types;


});

Route::get('/encounters', function(){
    
    $encounters = App\Encounter::all();

    return $encounters;


});