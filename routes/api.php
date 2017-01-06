<?php

use Illuminate\Http\Request;

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

Route::get('/meta-data', function(){

    //Instantiate Models
    $encounters = new App\Encounter;
    $clients     = new App\Client;

    //Overall
    $encounters_total   = $encounters->all()->count();
    $duration_total     = $encounters->all()->sum('duration');
    $actions_total      = $encounters->all()->where('actions_id', '!=', 1)->count();
    $clients_total      = $clients->count();

    //Current Month
    $encounters_current_month   = $encounters->getCurrentMonth()->count();
    $actions_current_month      = $encounters->getCurrentMonth()->where('actions_id', '!=', 1)->count();
    $duration_current_month     = $encounters->getCurrentMonth()->sum('duration');

    //Build Endpoint
    $data = array(
        'encounters_total'          => $encounters_total,
        'actions_total'             => $actions_total, 
        'clients_total'             => $clients_total,
        'duration_total'            => $duration_total,
        'encounters_current_month'  => $encounters_current_month,
        'actions_current_month'     => $actions_current_month,
        'duration_current_month'    => $duration_current_month
    );

    return $data;

});

//simple raw getters for DB/API development
Route::get('/clients-new', function(){
    
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