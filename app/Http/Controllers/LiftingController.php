<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Lifting;
use App\Models\LiftingProduct;
use App\Models\User;

class LiftingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liftings = Lifting::orderBy('id','desc')->get();
       return view ('admin.liftings.index')->with(compact('liftings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $products = Product::all();
        return view ('admin.liftings.add')->with(compact('vendors', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $submissionDate = date('Y-m-d', strtotime($request->submissionDate));
        $voucherDate = date('Y-m-d', strtotime($request->voucherDate));

        $lifting = Lifting::create([
            'serial_no' => $request->serialNo,
            'vaouchar_no' => $request->voucharNo,
            'vendor_id' => $request->vendorId,
            'purchase_by' => $request->purchaseBy,           
            'submission_date' => $submissionDate,
            'vouchar_date' => $voucherDate,          
            'total_qty' => $request->totalQty,          
            'total_price' => $request->totalPrice,          
            'total_mrp_price' => $request->totalMrpPrice        
        ]);

        $countProduct = count($request->productId);
        if($request->productId){
            $postData = [];
            for ($i=0; $i <$countProduct ; $i++) { 
                $postData[] = [
                    'lifting_id'=> $lifting->id,
                    'vendor_id' => $request->vendorId,
                    'product_id' => $request->productId[$i],
                    'product_name' => $request->productName[$i],
                    'model_no' => $request->productModel[$i],
                    'serial_no' => $request->productSerialNo[$i],
                    'qty' => $request->productQty[$i],
                    'price' => $request->productPrice[$i], 
                    'mrp' => $request->productMrpPrice[$i]
                ];
            }                
            LiftingProduct::insert($postData);
        }

        return redirect(route('lifting.index'))->with('success','Product Purchasing Added Successfully');
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
        $vendors = Vendor::all();
        $products = Product::all();
        $lifting = Lifting::where('id',$id)->first();
        $liftingProducts = LiftingProduct::select('lifting_products.*','products.name as productName')
            ->join('products','products.id','=','lifting_products.product_id')
            ->where('.lifting_products.lifting_id',$id)
            ->get();

        return view('admin.liftings.edit')->with(compact('vendors','products','lifting','liftingProducts'));
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


        $submissionDate = date('Y-m-d', strtotime($request->submissionDate));
        $voucherDate = date('Y-m-d', strtotime($request->voucherDate));
        $lifting = Lifting::find($id);
     
         $lifting->update([
            'serial_no' => $request->serialNo,
            'vaouchar_no' => $request->voucharNo,
            'vendor_id' => $request->vendorId,
            'purchase_by' => $request->purchaseBy,           
            'submission_date' => $submissionDate,
            'vouchar_date' => $voucherDate,          
            'total_qty' => $request->totalQty,          
            'total_price' => $request->totalPrice,          
            'total_mrp_price' => $request->totalMrpPrice        
        ]);

        LiftingProduct::where('lifting_id',$id)->delete();

        $countProduct = count($request->productId);
        if($request->productId){
            $postData = [];
            for ($i=0; $i <$countProduct ; $i++) { 
                $postData[] = [
                    'lifting_id'=> $lifting->id,
                    'vendor_id' => $request->vendorId,
                    'product_id' => $request->productId[$i],
                    'product_name' => $request->productName[$i],
                    'model_no' => $request->productModel[$i],
                    'serial_no' => $request->productSerialNo[$i],
                    'qty' => $request->productQty[$i],
                    'price' => $request->productPrice[$i], 
                    'mrp' => $request->productMrpPrice[$i]
                ];
            }                
            LiftingProduct::insert($postData);
        }

        return redirect(route('lifting.index'))->with('success','Product Purchasing Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lifting::where('id',$id)->delete();
        LiftingProduct::where('lifting_id',$id)->delete();
        return redirect(route('lifting.index'))->with('error','Purchasing Deleted Successfully');
    }

     public function liftingProductInfo(Request $request)
    {
        $product = Product::where('id',$request->productId)->first();
        if($request->ajax())
        {
            return response()->json([
                'product'=>$product
            ]);
        }
    }
}
