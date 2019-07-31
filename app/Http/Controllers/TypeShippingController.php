<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeShipping;

class TypeShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeshippings = TypeShipping::all();
        return view('typeshipping.index', compact('typeshippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeshipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required'
          
        ]);

        $request['id'] = time();

        TypeShipping::create($request->all());

        return redirect()->route('typeshipping.index')->with('Correcto','Tipo Envio Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeshipping = TypeShipping::find($id);

        return view('typeshipping.show',compact('typeshipping'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $typeshipping = TypeShipping::find($id);

        return view('typeshipping.edit',compact('typeshipping'));
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
            'name' => 'required'
                    ]);


       TypeShipping::find($id)->update($request->all());

        return redirect()->route('typeshipping.index')->with('Correcto','Tipo Envio Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeshipping = TypeShipping::find($id);

        try
        {
            $typeshipping->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('typeshipping.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('typeshipping.index')->with('Correcto','Tipo Envio eliminado');
    }
}
