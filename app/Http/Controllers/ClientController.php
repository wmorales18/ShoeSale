<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
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
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $request['id'] = time();

        Client::create($request->all());

        return redirect()->route('client.index')->with('Correcto','Cliente Agregado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('client.show',compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $client = Client::find($id);

        return view('client.edit',compact('client'));
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
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required'
                    ]);


        Client::find($id)->update($request->all());

        return redirect()->route('client.index')->with('Correcto','Cliente Actualizado');


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
        $client = Client::find($id);

        try
        {
            $client->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('client.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('client.index')->with('Correcto','Cliente eliminado');
    }
    }


