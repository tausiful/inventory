<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use DB;

class StockReportController extends Controller
{
     public function index(Request $request)
    {
       
        $category = $request->category;
        $product = $request->product;
        $print = $request->print;
        $products = Product::all();
        $categories = Category::all();

        if ($category == "" && $product == "")
        {
            $stockReports = DB::table('view_stock_report')
                ->select('categoryId','categoryName','productId','productName','modelNo', DB::raw('(SUM(liftingQty) - SUM(productIssueQty)) as remainingQty'), DB::raw('SUM(liftingQty) as totalLifting'), DB::raw('SUM(productIssueQty) as totalProductIssue'))
                ->groupBy('categoryId','productId')
                ->orderBy('categoryId','asc')
                ->orderBy('productId','asc')
                ->get();
        }
        else
        {
            $stockReports = DB::table('view_stock_report')
                ->select('categoryId','categoryName','productId','productName','modelNo', DB::raw('(SUM(liftingQty) - SUM(productIssueQty)) as remainingQty'), DB::raw('SUM(liftingQty) as totalLifting'), DB::raw('SUM(productIssueQty) as totalProductIssue'))
                ->orWhere(function($query) use($category,$product){
                    if (@$category)
                    {
                        $query->where('categoryId',$category);
                    }

                    if (@$product)
                    {
                        $query->where('productId',$product);
                    }
                })
                ->groupBy('categoryId','productId')
                ->orderBy('categoryId','asc')
                ->orderBy('productId','asc')
                ->get();
        }

        return view('admin.stockReport.index')->with(compact('category','product','categories','products','stockReports'));
    }
}
