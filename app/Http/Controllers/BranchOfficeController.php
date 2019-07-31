<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BranchOffice;
use App\ProductInventory;
use Illuminate\Database\QueryException;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branchoffices = BranchOffice::all();
        return view('branchoffice.index', compact('branchoffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('branchoffice.create');
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
            'phone' => 'required',
            'address' => 'required'
        ]);

        $request['id'] = time();

        BranchOffice::create($request->all());

        return redirect()->route('branchoffice.index')->with('Correcto','Sucursal Agregado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branchoffice = BranchOffice::find($id);
        $productinventories = ProductInventory::all();
         return view('branchoffice.show',['branchoffice'=>$branchoffice,'productinventories'=>$productinventories]);
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $branchoffice = BranchOffice::find($id);

        return view('branchoffice.edit',compact('branchoffice'));
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
        
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
                    ]);


        BranchOffice::find($id)->update($request->all());

        return redirect()->route('branchoffice.index')->with('Correcto','Surcursal Actualizado');


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
        $branchoffice = BranchOffice::find($id);

        try
        {
            $branchoffice->delete();
        }
        catch(QueryException  $qe)
        {
            return redirect()->route('branchoffice.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('branchoffice.index')->with('Correcto','Surcusal eliminado');
    }
    }


