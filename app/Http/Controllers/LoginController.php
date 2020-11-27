<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $validatedData=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);
        // $request->all();
        $email=$request->email;
        $password=$request->password;
        return 'Email : '.$email.' - ' .'Password : '.$password;
    }
}
