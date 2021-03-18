<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.index')->with('success','Category Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect(route('category.index'))->with('success', 'Category updated sucessfully');
    }
 
    public function destroy($id)
    {
        $category = Category::find($id);
        foreach($category->products as $product) {
            $product->delete();
        }
        $category->delete();
        return redirect()->route('category.index')->with('error', 'Category deleted successfully');
    }
}
