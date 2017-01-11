<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiActionsController extends Controller
{

    
    public function index(){

        return Action::all();

    }
    

    public function store(Request $request){

        //Validation Logic
        $this->validate($request, [
            'name' => 'required|min:3|unique:enc_actions|max:255'
        ]);
        
        return Action::create($request->all());

    }

    
    public function show($id){

        return Action::findOrFail($id);

    }
    

    
    public function update(Request $request, $id){

        Action::findOrFail($id)->update($request->all());

        return Response::json($request->all()); //response()->json()

    }
    

    
    public function destroy($id){

        return Action::destroy($id);
        
    }
    
}
