<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supplier.create');
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
            'description' => 'required',
            'phone' => 'required'
        ]);

        $request['id'] = time();

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('Correcto','Proveedor Agregado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.show',compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $supplier = Supplier::find($id);

        return view('supplier.edit',compact('supplier'));
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
            'description' => 'required',
            'phone' => 'required'
                    ]);


        Supplier::find($id)->update($request->all());

        return redirect()->route('supplier.index')->with('Correcto','Proveedor Actualizado');


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
        $supplier = Supplier::find($id);

        try
        {
            $supplier->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('supplier.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('supplier.index')->with('Correcto','Proveedor eliminado');
    }
    }


