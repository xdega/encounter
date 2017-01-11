<?php

namespace App\Http\Controllers;

use App\Type;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiTypesController extends Controller
{

    
    public function index(){

        return Type::all();

    }
    

    public function store(Request $request){

        //Validation Logic
        $this->validate($request, [
            'name' => 'required|min:3|unique:enc_types|max:255'
        ]);
        
        return Type::create($request->all());

    }

    
    public function show($id){

        return Type::findOrFail($id);

    }
    

    
    public function update(Request $request, $id){

        Type::findOrFail($id)->update($request->all());

        return Response::json($request->all()); //response()->json()

    }
    

    
    public function destroy($id) {

        return Type::destroy($id);

    }
    
}