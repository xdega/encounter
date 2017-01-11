<?php

namespace App\Http\Controllers;

use App\Encounter;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiEncountersController extends Controller
{

    
    public function index(){

        return Encounter::all();

    }
    

    public function store(Request $request){

        //Validation Logic
        $this->validate($request, [
            'clients_id'    => 'required|numeric',
            'types_id'      => 'required|numeric',
            'actions_id'    => 'required|numeric', 
            'users_id'      => 'required|numeric', 
            'date_time'     => 'required|', 
            'duration'      => 'required|numeric', 
        ]);

        //After Validation, Get Authed User and set to users_id field
        
        return Encounter::create($request->all());

    }

    
    public function show($id){

        return Encounter::findOrFail($id);

    }
    

    
    public function update(Request $request, $id){

        Encounter::findOrFail($id)->update($request->all());

        return Response::json($request->all()); //response()->json()

    }
    

    
    public function destroy($id) {

        return Encounter::destroy($id);

    }
    
}