<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getClient(Request $request){

        //output the received "name" input, for development purposes.
        echo "<script>console.log('Input Recieved: $request->name')</script>";

        return view('home');
    }
}
