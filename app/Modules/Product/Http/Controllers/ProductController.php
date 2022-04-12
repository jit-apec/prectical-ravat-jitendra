<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Product\Models\Product;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = product::all();
       // dd($products);
        return view("Product::list", compact('products'));
    }
    public function create()
    {
        return view("Product::add");
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:products'],
            'tag' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);
        $name = $request->name;
        $tag = $request->tag;
        $stock = $request->stock;
        $price = $request->price;
        if ($stock > 0) {
            Product::create([
                'name' => $name,
                'tag' => $tag,
                'price' => $price,
                'stock' => $stock,
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/admin/product/add')->with('status', 'Product added successfully');
        } else {
            return redirect('/admin/product/add')->with('status', 'Product Quantity is less then  zero');
        }
    }
    public function edit($id)
    {
        $products = Product::where('id', $id)->first();
        // dd($products);
        return view("Product::edit", compact('products'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required',
            'tag' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ]);
        $name = $request->name;
        $tag = $request->tag;
        $price = $request->price;
        $stock = $request->stock;
        if ($stock > 0) {
            $Product = [
                'name' => $name,
                'tag' => $tag,
                'stock' => $stock,
                'price' => $price,
                'user_id' => Auth::user()->id,
            ];
            //dd($Product);
            Product::where('id', $id)->update($Product);
            return back()->with('status', 'product update successfully!!');
        } else {
            return back()->with('status', 'product quantity is less then zero!');
        }
    }
    public function destroy(Request $request)
    {
        //  dd( $request->id);
        Product::where('id', $request->id)->delete();
        return response()->json(['status' => 'Product Delete Successfully']);
    }
    public function less_stock()
    {
        $products = Product::where('stock','<','10')->get();
        return view("Product::less_stock", compact('products'));
    }
}
