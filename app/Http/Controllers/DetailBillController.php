<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailBill;
use App\Bill;
use App\ProductInventory;

class DetailBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $detailbills = DetailBill::all();

        return view('detailbill.index',compact('detailbills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $detailbills=DetailBill::all();
        $bills = Bill::all();
        $productinventories = ProductInventory::all();
           return view('detailbill.create',[
            'detailbills'=> $detailbills,
            'bills'=>$bills,
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
            'bill_id' => 'required',
            'product_inventory_id' => 'required'

        ]);

        $request['id'] = time();
        $product_inventory= ProductInventory::find($request['product_inventory_id']);
        $request['subtotal']=$product_inventory->sale_price*$request['quantity'];
        DetailBill::create($request->all());

        return redirect()->route('bill.show', $request['bill_id'])->with('Correcto','Detalle Factura Agregado');

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
        $detailbill = DetailBill::find($id);

        return view('detailbill.show',compact('detailbill'));
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
        $detailbill = DetailBill::find($id);
        $bills = Bill::all();
        $productinventories = ProductInventory::all();

        return view('detailbill.edit',[
            'detailbill'=> $detailbill,
            'bills'=>$bills,
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
            'bill_id' => 'required',
            
            'product_inventory_id' => 'required'
                    ]);

        DetailBill::find($id)->update($request->all());
        
        return redirect()->route('bill.show', $request['bill_id'])->with('Correcto','Detalle Factura Actualizado');

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

          $detailbill = detailbill::find($id);

        try
        {
            $detailbill->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('detailbill.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('detailbill.index')->with('Correcto','Detalle Factura eliminado');
    }
}
