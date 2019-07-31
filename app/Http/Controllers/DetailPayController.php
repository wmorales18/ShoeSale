<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPay;
use App\TypePay;
use App\Bill;

class DetailPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $detailpays = DetailPay::all();

        return view('detailpay.index',compact('detailpays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $detailpays=DetailPay::all();
        $typepays = TypePay::all();
        $bills = Bill::all();
           return view('detailpay.create',[
            'detailpays'=> $detailpays,
            'typepays'=>$typepays,
            'bills'=>$bills
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
            'total' => 'required',
            'type_pay_id' => 'required',
            'bill_id' => 'required'

        ]);

        $request['id'] = time();

        DetailPay::create($request->all());

        return redirect()->route('detailpay.index')->with('Correcto','Detalle Pago Agregado');
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
        $detailpay = DetailPay::find($id);

        return view('detailpay.show',compact('detailpay'));
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
        $detailpay = DetailPay::find($id);
        $typepays = TypePay::all();
        $bills = Bill::all();

        return view('detailpay.edit',[
            'detailpay'=> $detailpay,
            'typepays'=>$typepays,
            'bills'=>$bills
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
            'total' => 'required',
            'type_pay_id' => 'required',
            'bill_id' => 'required'
                    ]);


        DetailPay::find($id)->update($request->all());

        return redirect()->route('detailpay.index')->with('Correcto','Detalle Pago Actualizado');
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

          $detailpay = DetailPay::find($id);

        try
        {
            $detailpay->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('detailpay.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('detailpay.index')->with('Correcto','Detalle Pago eliminado');
    }
}
