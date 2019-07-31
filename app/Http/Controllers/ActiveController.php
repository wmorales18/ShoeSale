<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Active;
use App\TypeActive;
use App\BranchOffice;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $actives = Active::all();

        return view('active.index',compact('actives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $actives=Active::all();
        $typeactives = TypeActive::all();
        $branchoffices = BranchOffice::all();
           return view('active.create',[
            'actives'=> $actives,
            'typeactives'=>$typeactives,
            'branchoffices'=>$branchoffices
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
            'descrition' => 'required',
            'value' => 'required',
            'branch_office_id' => 'required',
            'type_active_id' => 'required'

        ]);

        $request['id'] = time();

        try{
            Active::create($request->all());

        } catch(QueryException $error){
            return redirect()->route('active.index')->with('INCORRECTO',$error->getMessage());
        }

        

        return redirect()->route('active.index')->with('Correcto','Activo Agregado');
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
        $active = Active::find($id);

        return view('active.show',compact('active'));
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
        $active = Active::find($id);
        $typeactives = TypeActive::all();
        $branchoffices = BranchOffice::all();

        return view('active.edit',[
            'active'=> $active,
            'typeactives'=>$typeactives,
            'branchoffices'=>$branchoffices
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
            'descrition' => 'required',
            'value' => 'required',
            'branch_office_id' => 'required',
            'type_active_id' => 'required'
                    ]);


        Active::find($id)->update($request->all());

        return redirect()->route('active.index')->with('Correcto','Activo Actualizado');
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

          $active = Active::find($id);

        try
        {
            $active->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('active.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('active.index')->with('Correcto','Activo eliminado');
    }
}
