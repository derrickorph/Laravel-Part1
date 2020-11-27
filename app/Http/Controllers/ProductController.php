<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $fruits= array('Mangue','Orange','Banane','Pomme');
        return view('welcome',compact('fruits'));
    }
}
