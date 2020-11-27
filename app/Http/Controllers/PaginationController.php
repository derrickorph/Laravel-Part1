<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function allUsers()
    {
        $users= User::Paginate(10);
        return view('users',compact('users'));
    }
}
