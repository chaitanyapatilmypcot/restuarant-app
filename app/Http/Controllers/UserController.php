<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;

class UserController extends Controller
{
    function login(Request $req) {
        return view('login');
    }

    function register(Request $req) {
        return view('register');
    }

    function registerUser(RegisterPostRequest $req) {
        $data = User::create($req->all());
        return redirect('login')->with('registered', $data['username']);
    }

    
    function loginUser(LoginPostRequest $req) {

        $credentials = [
            'email' => $req->email,
            'password' => $req->password,
        ];

        $user = User::where($credentials)->first();

        if(!empty($user)) {
            $req->session()->put('loggedIn', true);
            $req->session()->put('name', $user);
            return redirect('/')->with('login', ' ,logged In!');
        }
        return redirect('login')->with('Error', 'Invalid Credentials try again or Sign up');
    }


    function logout(Request $req) {
        if(session()->has('loggedIn')) {
            session()->pull('loggedIn');
        }

        return redirect('login')->with('logout', 'You are logged out.');
    }

}
