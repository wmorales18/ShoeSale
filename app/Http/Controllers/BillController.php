<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Client;
use App\DetailBill;
use App\ProductInventory;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $bills = Bill::all();

        return view('bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bills=Bill::all();
        $clients = Client::all();
           return view('bill.create',[
            'bills'=> $bills,
            'clients'=>$clients
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
            'date' => 'required',
            'client_id' => 'required'
        ]);

        $request['id'] = time();
        $request['user_id'] = Auth::User()->id;
        Bill::create($request->all());

        return redirect()->route('bill.index')->with('Correcto','Factura Agregada');
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
        $bill = Bill::find($id);
        $detailbills = DetailBill::all();
        $productinventories = ProductInventory::all();
        //return view('bill.show',compact('bill'));



         return view('bill.show',['bill'=>$bill,'detaillbills'=>$detailbills, 'productinventories'=>$productinventories]);
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
        $bill = Bill::find($id);
        $clients = Client::all();

        return view('bill.edit',[
            'bill'=> $bill,
            'clients'=>$clients
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
            'date' => 'required',
            'client_id' => 'required'
                    ]);


        Bill::find($id)->update($request->all());

        return redirect()->route('bill.index')->with('Correcto','Factura Actualizado');
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

          $bill = Bill::find($id);

        try
        {
            $bill->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('bill.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('bill.index')->with('Correcto','Factura eliminado');
    }
}
