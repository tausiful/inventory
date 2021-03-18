<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\LiftingProduct;
use App\Models\ProductIssue;
use App\Models\ProductIssueList;
use App\Models\Customer;

class ProductIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $issuedProducts = ProductIssue::orderBy('id', 'desc')->get();

         return view('admin.productIssues.index')->with(compact('issuedProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $customers = Customer::all();
          $products  = Product::all();
            return view('admin.productIssues.add')->with(compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $this->validation($request);
        // dd($request->all());

        // dd($request->productSerial);

        $issueDate = date('Y-m-d', strtotime($request->issueDate));

        $productIssue = ProductIssue::create([
           
            'customer_id' => $request->customerId,
            'issue_no' => $request->productIssueNo,
            'date' => $issueDate,
            'total_qty' => $request->totalQty,
            'total_amount' => $request->totalAmount
        ]);

        $countProduct = count($request->productId);
        if ($request->productId) {
            $postData = [];
            for ($i = 0; $i < $countProduct; $i++) {
                $postData[] = [
                    'issue_id' => $productIssue->id,
                    'product_id' => $request->productId[$i],
                    'model_no' => $request->productModel[$i],
                    'serial_no' => $request->productSerial[$i],
                    'price' => $request->productPrice[$i],
                    'qty' => $request->productQty[$i],
                    'amount' => $request->amount[$i]
                ];
            }
            ProductIssueList::insert($postData);
        }

        return redirect(route('productIssue.index'))->with('msg', 'Product Sale added Successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issuedProduct = ProductIssue::where('id', $id)->first();
        $issuedProductLists = ProductIssueList::where('issue_id', $id)->get();
        $customers = Customer::all();
        $products  = Product::all();
        return view('admin.productIssues.edit')->with(compact('customers', 'products', 'issuedProduct', 'issuedProductLists'));
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

        $issueDate = date('Y-m-d', strtotime($request->issueDate));

        $productIssue = ProductIssue::find($id);

        $productIssue->update([
            'customer_id' => $request->customerId,
            'issue_no' => $request->productIssueNo,
            'date' => $issueDate,
            'total_qty' => $request->totalQty,
            'total_amount' => $request->totalAmount
        ]);

        ProductIssueList::where('issue_id', $id)->delete();

        $countProduct = count($request->productId);
        if ($request->productId) {
            $postData = [];
            for ($i = 0; $i < $countProduct; $i++) {
                $postData[] = [
                    'issue_id' => $productIssue->id,
                    'product_id' => $request->productId[$i],
                    'model_no' => $request->productModel[$i],
                    'serial_no' => $request->productSerial[$i],
                    'price' => $request->productPrice[$i],
                    'qty' => $request->productQty[$i],
                    'amount' => $request->amount[$i]
                ];
            }
            ProductIssueList::insert($postData);
        }

        return redirect(route('productIssue.index'))->with('success', 'Product Sale Updated Successfully');
    }

   
    public function destroy($id)
    {
        ProductIssue::where('id', $id)->delete();
        ProductIssueList::where('issue_id', $id)->delete();
        return redirect(route('productIssue.index'))->with('error','Product Sale Deleted Successfully');
    }


    public function productSerialInfo(Request $request)
    {

       
        $output = '';

         $productSerials = LiftingProduct::select('lifting_products.*')
            ->leftJoin('product_issue_lists', 'product_issue_lists.serial_no', '=', 'lifting_products.serial_no')
            ->whereNull('product_issue_lists.serial_no')
            ->where('lifting_products.product_id', $request->productId)
            ->where('lifting_products.status', '1')
            ->get();

        if ($request->ajax()) {
            return response()->json([
                'productSerials' => $productSerials
            ]);
        }
    }

     public function productInfo(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();

        if ($request->ajax()) {
            return response()->json([
                'product' => $product
            ]);
        }
    }


}
