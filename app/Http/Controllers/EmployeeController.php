<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\BranchOffice;
use App\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $employees = Employee::all();

        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees=Employee::all();
        $branchoffices = BranchOffice::all();
        $users = User::all();
           return view('employee.create',[
            'employees'=> $employees,
            'branchoffices'=>$branchoffices,
            'users'=>$users
           ]);
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
         $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'salary' => 'required'
        ]);

        $request['id'] = time();

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('Correcto','Empleado Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::find($id);

        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $branchoffices = BranchOffice::all();
        $users = User::all();

        return view('employee.edit',[
            'employee'=> $employee,
            'branchoffices'=>$branchoffices,
            'users'=>$users
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

          $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'salary' => 'required'
                    ]);


        Employee::find($id)->update($request->all());

        return redirect()->route('employee.index')->with('Correcto','Empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

          $employee = Employee::find($id);

        try
        {
            $employee->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('employee.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('employee.index')->with('Correcto','Empleado eliminado');
    }
}
