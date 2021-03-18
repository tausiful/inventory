<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
       return view('admin.products.index')->with(compact('products')); 
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add')->with(compact('categories')); 
    }

  
    public function store(Request $request)
    {
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'model_no' => $request->model_no,
            'description' => $request->description,
            'cost_price' => $request->cost_price,
            'mrp' => $request->mrp
        ]);

        return redirect(route('product.index'))->with('success', 'Product Created successfully');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
          $categories = Category::all();
          $product = Product::find($id);
          return view('admin.products.edit')->with(compact('categories', 'product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'model_no' => $request->model_no,
            'description' => $request->description,
            'cost_price' => $request->cost_price,
            'mrp' => $request->mrp
        ]);

        return redirect(route('product.index'))->with('success', 'Product Updated successfully');
    }

    
    public function destroy($id)
    {
       $product = Product::find($id);
       $product->delete();
       return redirect(route('product.index'))->with('error','Product Deleted Successfully');
    }
}
