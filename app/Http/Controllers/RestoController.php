<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//db
use App\Models\Restaurant;

class RestoController extends Controller
{
    function view() {
        return view('home');
    }

    function list() {

        return Restaurant::all();
    }
}
