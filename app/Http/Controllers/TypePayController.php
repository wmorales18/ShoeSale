<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypePay;

class TypePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typepays = TypePay::all();
        return view('typepay.index', compact('typepays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typepay.create');
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

        TypePay::create($request->all());

        return redirect()->route('typepay.index')->with('Correcto','Tipo pago Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typepay = TypePay::find($id);

        return view('typepay.show',compact('typepay'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $typepay = TypePay::find($id);

        return view('typepay.edit',compact('typepay'));
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


       TypePay::find($id)->update($request->all());

        return redirect()->route('typepay.index')->with('Correcto','Tipo Pago Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typepay = TypePay::find($id);

        try
        {
            $typepay->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('typepay.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('typepay.index')->with('Correcto','Tipo pago eliminado');
    }
}
