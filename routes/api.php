<?php

use Carbon\Carbon;
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

Route::get('/meta-data/{year?}', function( $year = NULL ) {

    //Set to Current Year (If None Supplied)
    $now = Carbon::now();
    if(!$year) $year = $now->year;

    //Instantiate Models
    $encounters = new App\Encounter;
    $clients     = new App\Client;

    //Overall
    $encounters_total   = $encounters->all()->count();
    $duration_total     = $encounters->all()->sum('duration');
    $actions_total      = $encounters->all()->where('actions_id', '!=', 1)->count();
    $clients_total      = $clients->count();

    //Current Month
    $encounters_current_month   = $encounters->getEncounters($now->month, $year)->count();
    $actions_current_month      = $encounters->getEncounters($now->month, $year)->where('actions_id', '!=', 1)->count();
    $duration_current_month     = $encounters->getEncounters($now->month, $year)->sum('duration');

    //By Month
    $encounters_monthly = array(
        'jan' => $encounters->getEncounters('1', $year)->count(),
        'feb' => $encounters->getEncounters('2', $year)->count(),
        'mar' => $encounters->getEncounters('3', $year)->count(),
        'apr' => $encounters->getEncounters('4', $year)->count(),
        'may' => $encounters->getEncounters('5', $year)->count(),
        'jun' => $encounters->getEncounters('6', $year)->count(),
        'jul' => $encounters->getEncounters('7', $year)->count(),
        'aug' => $encounters->getEncounters('8', $year)->count(),
        'sep' => $encounters->getEncounters('9', $year)->count(),
        'oct' => $encounters->getEncounters('10', $year)->count(),
        'nov' => $encounters->getEncounters('11', $year)->count(),
        'dec' => $encounters->getEncounters('12', $year)->count()

    );

    //By Day (Current Week)
    $encounters_days_ago = array(
        'zero'  => $encounters->getEncountersDay(0)->count(),
        'one'   => $encounters->getEncountersDay(1)->count(), 
        'two'   => $encounters->getEncountersDay(2)->count(), 
        'three' => $encounters->getEncountersDay(3)->count(), 
        'four'  => $encounters->getEncountersDay(4)->count(), 
        'five'  => $encounters->getEncountersDay(5)->count(), 
        'six'   => $encounters->getEncountersDay(6)->count()
    );

    //Build Endpoint
    $data = array(
        'encounters_total'             => $encounters_total,
        'actions_total'                => $actions_total, 
        'clients_total'                => $clients_total,
        'duration_total'               => $duration_total,
        'encounters_current_month'     => $encounters_current_month,
        'actions_current_month'        => $actions_current_month,
        'duration_current_month'       => $duration_current_month, 
        'encounters_monthly'           => $encounters_monthly, 
        'encounters_days_ago'          => $encounters_days_ago
    );

    return $data;

});

Route::get('/encounters/{month}/{year}', function($month, $year){
    $encounters = new App\Encounter;

    $result = $encounters->getEncounters($month, $year);

    return $result;

});

Route::get('/encounters/current-year', function(){
    $encounters = new App\Encounter;

    $result = $encounters->getCurrentYear();

    return $result;

});

Route::get('/encounters/last-week', function(){
    //$encounters = new App\Encounter;

    //return $encounters->getLastWeek()->groupBy( date('d') );

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