<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RestoPostRequest;

//RestuarantDB
use App\Models\Restaurant;

class RestoController extends Controller
{
    function view() {
        return view('home');
    }
    

    function list() {
        $userId = session('name')['id'];
        $data = Restaurant::where('user_id', $userId)->paginate(4);
        return view('list', ['data' => $data]);
    }

    function homeList(){
        //$userId = session('name')['id'];
        $data=Restaurant::all();        // for particular user : 'user_id', $userId
        return view('home', ['data' => $data ]);
    }


    function add(RestoPostRequest $req) {
        // if(session('loggedIn')) {
        //     print_r(session('name')['id']);
        //     exit;
        // } 

        $input = $req->all();
        $input['user_id'] = session('name')['id'];

        // to save img in public folder and show
        $file = $req->file('file');
        $ogName = $file->getClientOriginalName();
        $input['file'] =  $ogName;

        $file->move('img/', $ogName);
        
        


        $resto = Restaurant::create($input);        //dynamically take the user's id and map to the restuarant table to show the user, the list he has created only not other's list!
 
        
        $req->session()->flash('user', $input['name']);

        
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

        // delete file in public route and update new one and upload to efficient storage
        if($req->hasFile('file')) {

            if($req->has('file')){
                File::delete(public_path('img/' . $data['file']));
            }

        $file = $req->file('file');
        $ogName = $file->getClientOriginalName();
        
        $data->file = $ogName;
        $file->move('img/', $ogName);
        }

        $data->name = $req->name;
        $data->email = $req->email;
        $data->address = $req->address; 

        //edit img
        

        $data->save();

        return redirect('list')->with('edit', $data['name']);
    }


    function search(Request $req) {
        $result = Restaurant::where('name', 'like', '%' . $req->search . '%')->get();
        $totalRestaurantCount = Restaurant::count();

        return response()->json([
            'data' => $result->toArray(),
            'totalRestaurantCount' => $totalRestaurantCount
        ]);


        // return $result->toArray();
        // if (count($result)){
        //     return view('search',['data' => $result]);
        // } else {
        //     return ['result' => 'Data Not found!'];
        // }
    }
}
