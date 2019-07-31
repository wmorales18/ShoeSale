<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $typeproducts = TypeProduct::all();
        return view('typeproduct.index', compact('typeproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeproduct.create');
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

        TypeProduct::create($request->all());

        return redirect()->route('typeproduct.index')->with('Correcto','Tipo Producto Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeproduct = TypeProduct::find($id);

        return view('typeproduct.show',compact('typeproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $typeproduct = TypeProduct::find($id);

        return view('typeproduct.edit',compact('typeproduct'));
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


       TypeProduct::find($id)->update($request->all());

        return redirect()->route('typeproduct.index')->with('Correcto','Tipo Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeproduct = TypeProduct::find($id);

        try
        {
            $typeproduct->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('typeproduct.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('typeproduct.index')->with('Correcto','Tipo Producto eliminado');
    }
}
