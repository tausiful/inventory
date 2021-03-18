<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
  
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index')->with(compact('customers'));
    }

    public function create()
    {
        $maxId = Customer::max('id');
        $codePrefix = "cust-".date('ymd')."-";

        if ($maxId)
        {
            // $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $customerCode = $codePrefix.str_pad($maxId + 1, 9, '0', STR_PAD_LEFT);
        }
        else
        {
            $customerCode = $codePrefix."000000001";
        }
        return view('admin.customers.add')->with(compact('customerCode'));
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->code = $request->code;
        $customer->national_id = $request->national_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customer.index')->with('success','Customer Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->code = $request->code;
        $customer->national_id = $request->national_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect(route('customer.index'))->with('success', 'Customer updated sucessfully');
    }
 
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('error', 'Customer deleted successfully');
    }
}
