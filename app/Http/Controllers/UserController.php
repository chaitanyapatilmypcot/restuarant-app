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

    function registerUser(Request $req) {

        $req->validate([
            'username' => 'required | min:4 | max:20',
            'email'    => 'required | unique:users',
            'password' => 'required | min:6 | max:30',
        ]);

        $data = new User;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->save();
        return redirect('login')->with('registered', $data['username']);
    }

    function loginUser(Request $req) {

        $req->validate([
                'email' => 'required | exists:users',  //can add condition if user email is no found and told them to register
                'password' => 'required',
            ]
            , 
            [
                'email.exists' => 'You are not registered yet, kindly register first!',
            ]
        );

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
