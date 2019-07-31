<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use App\Color;
use App\Supplier;
use App\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $products = Product::all();

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=Product::all();
        $typeproducts = TypeProduct::all();
        $colors = Color::all();
        $suppliers = Supplier::all();
        $sizes = Size::all();
           return view('product.create',[
            'products'=> $products,
            'typeproducts'=>$typeproducts,
            'colors'=>$colors,
            'suppliers'=>$suppliers,
            'sizes'=>$sizes
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
            'name' => 'required',
            'description' => 'required',
            'price_cost' => 'required',
            'type_product_id' => 'required',
            'color_id' => 'required',
            'supplier_id' => 'required',
            'size_id' => 'required'

        ]);

        $request['id'] = time();

        Product::create($request->all());

        return redirect()->route('product.index')->with('Correcto','Producto Agregado');
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
        $product = Product::find($id);

        return view('product.show',compact('product'));
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
        $product = Product::find($id);
        $typeproducts = TypeProduct::all();
        $colors = Color::all();
        $suppliers = Supplier::all();
        $sizes = Size::all();

        return view('product.edit',[
            'product'=> $product,
            'typeproducts'=>$typeproducts,
            'colors'=>$colors,
            'suppliers'=>$suppliers,
            'sizes'=>$sizes
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
           'name' => 'required',
            'description' => 'required',
            'price_cost' => 'required',
            'type_product_id' => 'required',
            'color_id' => 'required',
            'supplier_id' => 'required',
            'size_id' => 'required'
                    ]);


        Product::find($id)->update($request->all());

        return redirect()->route('product.index')->with('Correcto','Producto Actualizado');
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

          $product = Product::find($id);

        try
        {
            $product->delete();
        }
        catch(QueryException $qe)
        {
            return redirect()->route('product.index')->with('Incorrecto',$qe->getMessage());
        }

        return redirect()->route('product.index')->with('Correcto','Producto eliminado');
    }
}
