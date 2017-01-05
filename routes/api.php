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