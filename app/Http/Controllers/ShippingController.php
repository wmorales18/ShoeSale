<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\TypeShipping;
use App\ProductInventory;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::all();
        return view('shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shipping.create');
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
            'description' => 'required',
            'date' => 'required',
            'total_product' => 'required'
          
        ]);

        $request['id'] = time();

        Shipping::create($request->all());

        return redirect()->route('shipping.show', $request['id'])->with('Correcto','Envio Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping = Shipping::find($id);
        $typeshippings = TypeShipping::all();
        $productinventories = ProductInventory::all();
        


        return view('shipping.show',['shipping'=>$shipping, 'typeshippings'=>$typeshippings, 'productinventories'=>$productinventories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $shipping = Shipping::find($id);

        return view('shipping.edit',compact('shipping'));
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
            'description' => 'required',
            'date' => 'required',
            'total_product' => 'required'
                    ]);


       Shipping::find($id)->update($request->all());

        return redirect()->route('shipping.index')->with('Correcto','Envio Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);

        try
        {
            $shipping->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('shipping.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('shipping.index')->with('Correcto','Envio eliminado');
    }
}
