<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req) {
        return view('login');
    }

    function register(Request $req) {
        return view('register');
    }
}
