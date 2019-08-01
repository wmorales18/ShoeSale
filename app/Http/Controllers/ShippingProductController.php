<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShippingProduct;
use App\TypeShipping;
use App\Shipping;
use App\ProductInventory;

class ShippingProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $shippingproducts = ShippingProduct::all();

        return view('shippingproduct.index',compact('shippingproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shippingproducts=ShippingProduct::all();
        $typeshippings = TypeShipping::all();
        $shippings = Shipping::all();
        $productinventories = ProductInventory::all();
        return view('shippingproduct.create',[
            'shippingproducts'=> $shippingproducts,
            'typeshippings'=>$typeshippings,
            'shippings'=>$shippings,
            'productinventories'=>$productinventories
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
            'quantity' => 'required',
            'type_shipping_id' => 'required',
            'shipping_id' => 'required',
            'product_inventory_id' => 'required'
            ]);

        $request['id'] = time();

        ShippingProduct::create($request->all());
            


        return redirect()->route('shipping.show',$request['shipping_id'])->with('Correcto','Envio Producto Agregado');
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
        $shippingproduct = ShippingProduct::find($id);

        return view('shippingproduct.show',compact('shippingproduct'));
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
        $shippingproduct = ShippingProduct::find($id);
        $typeshippings = TypeShipping::all();
        $shippings = Shipping::all();
        $productinventories = ProductInventory::all();

        return view('shippingproduct.edit',[
            'shippingproduct'=> $shippingproduct,
            'typeshippings'=>$typeshippings,
            'shippings'=>$shippings,
            'productinventories'=>$productinventories
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
           'quantity' => 'required',
            'type_shipping_id' => 'required',
            'shipping_id' => 'required',
            'product_inventory_id' => 'required'
                    ]);


        ShippingProduct::find($id)->update($request->all());

        return redirect()->route('shippingproduct.index')->with('Correcto','Envio Producto Actualizado');
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

          $shippingproduct = shippingproduct::find($id);

        try
        {
            $shippingproduct->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('shippingproduct.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('shipping.index')->with('Correcto','Envio Producto eliminado');
    }
}
