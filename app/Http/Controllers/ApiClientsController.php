<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiClientsController extends Controller
{

    
    public function index(){

        return Client::all();

    }
    

    public function store(Request $request){

        //Validation Logic
        $this->validate($request, [
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'age'           => 'numeric',
            'phone'         => 'numeric',
            'email'         => 'email',
            'portrait_url'  => 'url'
        ]);
        
        return Client::create($request->all());

    }

    
    public function show($id){

        return Client::findOrFail($id);

    }
    

    
    public function update(Request $request, $id){

        Client::findOrFail($id)->update($request->all());

        return Response::json($request->all()); //response()->json()

    }
    

    
    public function destroy($id) {

        return Client::destroy($id);

    }
    
}