@extends('layouts/app')
@section('content')
@php
use App\Models\Product;
@endphp
<form class="needs-validation" novalidate id="search" action="{{ route('stockReport.index') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Stock Report</h3></div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="print" value="print">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="category">Category</label>
                        <div class="form-group">
                            <select class="form-control chosen-select" id="category" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $categoryInfo)
                                    @php
                                        $select = "";
                                        if ($category)
                                        {
                                            if ($categoryInfo->id == $category)
                                            {
                                                $select = "selected";
                                            }
                                            else
                                            {
                                                $select = "";
                                            }
                                        }
                                    @endphp
                                    <option value="{{ $categoryInfo->id }}" {{ $select }}>{{ $categoryInfo->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div>

                    <div class="col-md-6">
                        <label for="product">Product</label>
                        <div class="form-group">
                            <select class="form-control chosen-select" id="product" name="product">
                                <option value="">Select Product</option>
                                @foreach ($products as $productInfo)
                                    @php
                                        $select = "";
                                        if ($product)
                                        {
                                            if ($productInfo->id == $product)
                                            {
                                                $select = "selected";
                                            }
                                            else
                                            {
                                                $select = "";
                                            }
                                        }
                                    @endphp
                                    <option value="{{ $productInfo->id }}" {{ $select }}>{{ $productInfo->name }}</option>
                                @endforeach
                            </select>
                        </div>                                  
                    </div>
                </div>                              
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect" name="btnSummary" value="search"><i class="fa fa-search"></i> Search</button>
                        
                    </div>
                </div>              
            </div>
        </div>
    </form>

        <div class="card" style="margin-bottom: 0px;">              
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Search Report</h3></div>
                </div>
            </div>  
            <div class="card-body">
                    <table  name="" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20px">Sl</th>
                                <th width="200px">Category</th>
                                <th>Product</th>
                                <th width="200px">Model</th>
                                <th width="110px">Lifting Qty</th>
                                <th width="110px">Sales Qty</th>
                                <th width="110px">Available stock Qty</th>
                                <th width="110px">Stock Valuation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sl = 1;
                                $allLifting = 0;
                                $allIssue = 0;
                                $allRemainingQty = 0;
                                $allValuation = 0;
                            @endphp

                            @foreach ($stockReports as $stockReport)
                                @php
                                    $product = Product::find($stockReport->productId);
                                @endphp
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $stockReport->categoryName }}</td>
                                        <td>{{ $stockReport->productName }}</td>
                                        <td>{{ $stockReport->modelNo }}</td>
                                        <td style="text-align: right;">{{ $stockReport->totalLifting }}</td>
                                        <td style="text-align: right;">{{ $stockReport->totalProductIssue }}</td>
                                        <td style="text-align: right;">{{ $stockReport->remainingQty }}</td>
                                        <td style="text-align: right;">{{ $product->cost_price * $stockReport->remainingQty }}</td>
                                    </tr>
                                    @php
                                    $allLifting +=  $stockReport->totalLifting;
                                    $allIssue +=  $stockReport->totalProductIssue;
                                    $allRemainingQty +=  $stockReport->remainingQty;
                                    $allValuation +=  $product->cost_price * $stockReport->remainingQty;
                                    @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="4"><b>Total</b></td>
                                <td align="right"><b>{{$allLifting}}</b></td>
                                <td align="right"><b>{{$allIssue}}</b></td>
                                <td align="right"><b>{{$allRemainingQty}}</b></td>
                                <td align="right"><b>{{$allValuation}}</b></td>
                            </tr>
                        </tfoot>
                    </table>                        
            </div>
        </div>
@stop