<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {
        // $name= 'Derrick';
        // $users=array(
        //     'name'=>'Derrick Dev',
        //     'email'=>'derrickdev@gmail.com',
        //     'phone'=>'97238961',
        // );
        // return view('user',compact('name','users'));


        // return $request->method();
        // return $request->path();
        // return $request->url();
        return $request->fullUrl();


    }
}
