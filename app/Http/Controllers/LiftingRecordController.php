<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use DB;
class LiftingRecordController extends Controller
{
   
    public function index(Request $request)
    {
        $vendor = $request->vendor;
        $category = $request->category;
        $product = $request->product;
        $fromDate = date('Y-m-d',strtotime($request->fromDate));
        $toDate = date('Y-m-d',strtotime($request->toDate));
        $print = $request->print;
        $btnSummary = $request->btnSummary;
        $btnRecord = $request->btnRecord;

        $vendors = Vendor::all();
        $products = Product::all();
        $categories = Category::all();

        if ($request->btnSummary == "Summary")
        {
            $liftingSummaries = DB::table('view_lifting_record')
                ->select('productName','productModelNo',DB::raw('SUM(productQty) as totalLifting'),DB::raw('SUM(price) as totalLiftingPrice'))
                ->orWhere(function($query) use($fromDate,$toDate,$vendor,$category,$product){
                    if (!empty($fromDate))
                    {
                        $query->whereBetween('liftingDate', array($fromDate,$toDate));
                    }

                    if ($vendor)
                    {
                        $query->where('vendorId',$vendor);
                    }

                    if ($category)
                    {
                        $query->where('categoryId',$category);
                    }

                    if ($product)
                    {
                        $query->where('productId',$product);
                    }
                })
                ->groupBy('productId')
                ->orderBy('productName','asc')
                ->get();
        }
        else
        {
            $liftingSummaries = "";
        }

        if ($request->btnRecord == "Record")
        {
            $liftingRecords = DB::table('view_lifting_record')
                ->select('view_lifting_record.*')
                ->orWhere(function($query) use($fromDate,$toDate,$vendor,$category,$product){
                    if (!empty($fromDate))
                    {
                        $query->whereBetween('liftingDate', array($fromDate,$toDate));
                    }

                    if ($vendor)
                    {
                        $query->where('vendorId',$vendor);
                    }

                    if ($category)
                    {
                        $query->where('categoryId',$category);
                    }

                    if ($product)
                    {
                        $query->where('productId',$product);
                    }
                })
                ->orderBy('productSerialNo','asc')
                ->get();
        }
        else
        {
            $liftingRecords = "";
        }

        return view('admin.liftingRecord.index')->with(compact('vendors', 'products', 'categories', 'vendor', 'category', 'product', 'fromDate', 'toDate', 'print', 'btnRecord', 'btnSummary', 'liftingRecords', 'liftingSummaries'));
    }
    
    
}
