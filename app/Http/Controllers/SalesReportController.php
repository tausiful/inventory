<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use DB;

class SalesReportController extends Controller
{
   
    public function index(Request $request)
    {
        
        $category = $request->category;
        $product = $request->product;
        $fromDate = date('Y-m-d',strtotime($request->fromDate));
        $toDate = date('Y-m-d',strtotime($request->toDate));
        $print = $request->print;
        $btnSummary = $request->btnSummary;
        $btnRecord = $request->btnRecord;

        $products = Product::all();
        $categories = Category::all();

        if ($request->btnSummary == "Summary")
        {
            $saleSummaries = DB::table('view_sales_record')
                ->select('productName','productModelNo',DB::raw('SUM(productQty) as totalQty'),DB::raw('SUM(price) as totalSalesPrice'))
                ->orWhere(function($query) use($fromDate,$toDate,$category,$product){
                    if (!empty($fromDate))
                    {
                        $query->whereBetween('date', array($fromDate,$toDate));
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
            $saleSummaries = "";
        }

        if ($request->btnRecord == "Record")
        {
            $saleRecords = DB::table('view_sales_record')
                ->select('view_sales_record.*')
                ->orWhere(function($query) use($fromDate,$toDate,$category,$product){
                    if (!empty($fromDate))
                    {
                        $query->whereBetween('date', array($fromDate,$toDate));
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
            $saleRecords = "";
        }

        return view('admin.salesReport.index')->with(compact('products', 'categories','category', 'product', 'fromDate', 'toDate', 'print', 'btnRecord', 'btnSummary', 'saleRecords', 'saleSummaries'));
    }

    
    
}
