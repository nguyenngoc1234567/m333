<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCode;
use Illuminate\Http\Request;

class product_codesController extends Controller
{

    public function index()
    {
        $products= ProductCode::all();
        return view('admin.productcode.index',compact('products'));
    }


    public function create()
    {
        return view('admin.productcode.add');
    }


    public function store(Request $request)
    {
        $products = new ProductCode();
        $products->code = $request->code;
        $products->product_id  = $request->product_id ;
        $products->save();
        return redirect()->route('productcode.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $products = ProductCode::find($id);
        return view('admin.productcode.edit', compact(['products']));
    }


    public function update(Request $request, $id)
    {
        $products = ProductCode::findOrFail($id);
        $products->code = $request->input('code');
        $products->product_id = $request->input('product_id');
        $products->save();

        return redirect()->route('productcode.index');
    }

    public function destroy($id)
    {
        $product = ProductCode::findOrFail($id);
        $product->delete();


        return redirect()->route('productcode.index');
    }
}
