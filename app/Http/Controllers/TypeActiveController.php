<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeActive;

class TypeActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeactives = TypeActive::all();
        return view('typeactive.index', compact('typeactives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeactive.create');
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
            'name' => 'required',
            'description' => 'required'
          
        ]);

        $request['id'] = time();

        TypeActive::create($request->all());

        return redirect()->route('typeactive.index')->with('Correcto','Tipo Activo Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeactive = TypeActive::find($id);

        return view('typeactive.show',compact('typeactive'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $typeactive = TypeActive::find($id);

        return view('typeactive.edit',compact('typeactive'));
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
            'description' => 'required'
                    ]);


       TypeActive::find($id)->update($request->all());

        return redirect()->route('typeactive.index')->with('Correcto','Tipo Activo Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeactive = TypeActive::find($id);

        try
        {
            $typeactive->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('typeactive.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('typeactive.index')->with('Correcto','Tipo Activo eliminado');
    }
}
