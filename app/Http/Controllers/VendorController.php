<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
       $vendors = Vendor::all();
       return view('admin.vendors.index')->with(compact('vendors')); 
    }

    
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.vendors.add')->with(compact('vendors')); 
    }

  
    public function store(Request $request)
    {
        Vendor::create([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect(route('vendor.index'))->with('success', 'Vendor Created Successfully');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
          $vendor = Vendor::find($id);
          return view('admin.vendors.edit')->with(compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->update([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect(route('vendor.index'))->with('success', 'Vendor Updated Successfully');
    }

    
    public function destroy($id)
    {
       $vendor = Vendor::find($id);
       $vendor->delete();
       return redirect(route('vendor.index'))->with('error','Vendor Deleted Successfully');
    }
}
