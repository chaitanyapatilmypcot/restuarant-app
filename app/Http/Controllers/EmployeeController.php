<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Restaurant;
use App\Http\Requests\EmployeePostRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Restaurant::all();
        return view('addEmployee', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EmployeePostRequest $req)
    {
        $input = $req->all();
        $data = Employee::create($input);

        $req->session()->flash('shift_allocate', $input['name']);
        
        return redirect('add_emp');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        
        $data['data'] = Employee::with('restaurant')->get();
        // echo "<pre>";
        // print_r($data);exit;
        return view('list_employee', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EmpData = Employee::find($id);

        $restoData = Restaurant::all();

        return view('edit_employee', ['empData' => $EmpData, 'restoData' => $restoData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data = Employee::find($req->id);

        $data->name = $req->name;
        $data->email = $req->email;
        $data->restaurant_id = $req->restaurant_id;

        $data->save();

        return redirect('list_emp')->with('emp_edit', $data['name']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();

        return redirect('list_emp')->with('emp_user',$data['name']);
    }

    public function practice_conn() {
        return view('practice_conn');
    }
}
