<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//RestuarantDB
use App\Models\Restaurant;

class RestoController extends Controller
{
    function view() {
        return view('home');
    }

    function list() {
        $data = Restaurant::all();
        return view('list', ['data' => $data]);
    }

    function add(request $req) {

        // Validation
        $req->validate([
            'name' => 'required | min:4 | max:20',
            'email' => 'required | unique:restaurants',
            'address' => 'required'
        ]);

        $resto = new Restaurant;
        $resto->name = $req->name;
        $resto->email = $req->email;
        $resto->address = $req->address;

        $data = $req->input();
        $req->session()->flash('user', $data['name']);

        $resto->save();
        return redirect('add');


    }

    function delete($id) {
        $data = Restaurant::find($id);
        $data->delete();

        return redirect('list')->with('user', $data['name']);
    }


    function edit($id) {
        $data = Restaurant::find($id);
        return view('edit', ['data' => $data]);

    }

    function update(Request $req) {
        $data = Restaurant::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->address = $req->address; 
        $data->save();

        return redirect('list')->with('edit', $data['name']);
    }


    function search(Request $req) {
        $result = Restaurant::where('name', 'like', '%' . $req->search . '%')->get();
        if (count($result)){
            return view('search',['data' => $result]);
        } else {
            return ['result' => 'Data Not found!'];
        }
    }
}
