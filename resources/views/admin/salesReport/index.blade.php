@extends('layouts/app')
@section('content')

<form class="needs-validation" novalidate id="search" action="{{ route('salesReport.index') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Sales Report</h3></div>
                   
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="print" value="print">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label for="from-date">From Date</label>
                        <input  type="text" class="form-control datepicker" id="{{ $print == "print" ? "" : "from_date" }}"  name="fromDate" placeholder="Select Date From" value="{{ date('d-m-Y',strtotime($fromDate)) }}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="to-date">To Date</label>
                        <input  type="text" class="form-control datepicker" id="{{ $print == "print" ? "" : "to_date" }}"   name="toDate" placeholder="Select Date To" value="{{ date('d-m-Y',strtotime($toDate)) }}" readonly>
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
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect" name="btnSummary" value="Summary"><i class="fa fa-search"></i> Sales Summary</button>
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect" name="btnRecord" value="Record"><i class="fa fa-search"></i> Sales History</button>
                    </div>
                </div>              
            </div>
        </div>
    </form>

     @if ($btnSummary != "" || $btnRecord != "")
        <div class="card" style="margin-bottom: 0px;">              
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Search Report</h3></div>
                                                                                                                                                                                                                                        
            </div>

            <div class="card-body">
                @if ($btnSummary == "Summary")
                    <table  name="salesSummary" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20px">SL#</th>
                                <th>Product Name</th>
                                <th width="200px">Model</th>
                                <th width="100px">Total Qty</th>
                                <th width="110px">Toal Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sl = 1;
                                $allQty = 0;
                                $allPrice = 0;
                            @endphp
                            @foreach ($saleSummaries as $saleSummary)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $saleSummary->productName }}</td>
                                    <td>{{ $saleSummary->productModelNo }}</td>
                                    <td align="right">{{ $saleSummary->totalQty }}</td>
                                    <td align="right">{{ $saleSummary->totalSalesPrice }}</td>
                                </tr>
                                @php
                                $allQty = $allQty + $saleSummary->totalQty;
                                $allPrice = $allPrice + $saleSummary->totalSalesPrice;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="3"><b>Total</b></td>
                                <td align="right"><b>{{$allQty}}</b></td>
                                <td align="right"><b>{{$allPrice}}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                @endif

                @if ($btnRecord == "Record")
                    <table  name="salesRecord" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20px">SL#</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Model</th>
                                <th>Serial</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sl = 1;
                                 $allQty = 0;
                                $allPrice = 0;
                            @endphp
                            @foreach ($saleRecords as $saleRecord)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ date('d-m-Y',strtotime($saleRecord->date )) }}</td>
                                    <td>{{ $saleRecord->categoryName }}</td>
                                    <td>{{ $saleRecord->productName }}</td>
                                    <td>{{ $saleRecord->productModelNo }}</td>
                                    <td>{{ $saleRecord->productSerialNo }}</td>
                                    <td align="right">{{ $saleRecord->productQty }}</td>
                                    <td align="right">{{ $saleRecord->price}}</td>
                                </tr>
                                @php
                                $allQty = $allQty + $saleRecord->productQty;
                                $allPrice = $allPrice + $saleRecord->price;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="6"><b>Total</b></td>
                                <td align="right"><b>{{$allQty}}</b></td>
                                <td align="right"><b>{{$allPrice}}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                @endif                            
            </div>
        </div>
    @endif

@stop