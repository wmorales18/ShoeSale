<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInventory;
use App\Product;
use App\BranchOffice;

class ProductInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $productinventories = ProductInventory::all();

        return view('productinventory.index',compact('productinventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productinventories=ProductInventory::all();
        $products = Product::all();
        $branchoffices = BranchOffice::all();
           return view('productinventory.create',[
            'productinventories'=> $productinventories,
            'products'=>$products,
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
            'sale_price' => 'required',
            'quantity' => 'required',
            'branch_office_id' => 'required',
            'product_id' => 'required'

        ]);

        $request['id'] = time();

        ProductInventory::create($request->all());

        return redirect()->route('productinventory.index')->with('Correcto','Producto Inventario Agregado');
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
        $productinventory = ProductInventory::find($id);

        return view('productinventory.show',compact('productinventory'));
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
        $productinventory = ProductInventory::find($id);
        $products = Product::all();
        $branchoffices = BranchOffice::all();

        return view('productinventory.edit',[
            'productinventory'=> $productinventory,
            'products'=>$products,
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
           'sale_price' => 'required',
            'quantity' => 'required',
            'branch_office_id' => 'required',
            'product_id' => 'required'
                    ]);


        ProductInventory::find($id)->update($request->all());

        return redirect()->route('productinventory.index')->with('Correcto','Producto Inventario Actualizado');
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

          $productinventory = ProductInventory::find($id);

        try
        {
            $productinventory->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('productinventory.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('productinventory.index')->with('Correcto','Producto Inventario eliminado');
    }
}
