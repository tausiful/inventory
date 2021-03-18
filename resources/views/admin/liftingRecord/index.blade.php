@extends('layouts/app')
@section('content')

<form class="needs-validation" novalidate id="search" action="{{ route('liftingRecord.index') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h3 class="card-title">Purchasing Report</h3></div>
                   
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
                        <label for="supplier">Vendor</label>
                        <div class="form-group">
                            <select class="form-control chosen-select" id="vendor" name="vendor">
                                <option value="">Select Vendor</option>
                                @foreach ($vendors as $vendorInfo)
                                    @php
                                        $select = "";
                                        if ($vendor)
                                        {
                                            if ($vendorInfo->id == $vendor)
                                            {
                                                $select = "selected";
                                            }
                                            else
                                            {
                                                $select = "";
                                            }
                                        }
                                    @endphp
                                    <option value="{{ $vendorInfo->id }}" {{ $select }}>{{ $vendorInfo->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="from-date">From Date</label>
                        <input  type="text" class="form-control datepicker" id="{{ $print == "print" ? "" : "from_date" }}"  name="fromDate" placeholder="Select Date From" value="{{ date('d-m-Y',strtotime($fromDate)) }}" readonly>
                    </div>
                    <div class="col-md-3 form-group">
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
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect" name="btnSummary" value="Summary"><i class="fa fa-search"></i> Purchasing Summary</button>
                        <button type="submit" class="btn btn-outline-info btn-lg waves-effect" name="btnRecord" value="Record"><i class="fa fa-search"></i> Purchasing History</button>
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
                    <table  name="liftingSummary" class="table table-striped table-bordered second" style="width:100%">
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
                            @foreach ($liftingSummaries as $liftingSummary)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $liftingSummary->productName }}</td>
                                    <td>{{ $liftingSummary->productModelNo }}</td>
                                    <td align="right">{{ $liftingSummary->totalLifting }}</td>
                                    <td align="right">{{ $liftingSummary->totalLiftingPrice }}</td>
                                </tr>
                                @php
                                $allQty = $allQty + $liftingSummary->totalLifting;
                                $allPrice = $allPrice + $liftingSummary->totalLiftingPrice;
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
                    <table  name="liftingRecord" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20px">SL#</th>
                                <th>Date</th>
                                <th>Voucher No</th>
                                <th>Vendor</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Serial</th>
                                <th>Model</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $sl = 1;
                                $allQty = 0;
                                $allPrice = 0;
                            @endphp
                            @foreach ($liftingRecords as $liftingRecord)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ date('d-m-Y',strtotime($liftingRecord->liftingDate )) }}</td>
                                    <td>{{ $liftingRecord->liftingNo }}</td>
                                    <td>{{ $liftingRecord->vendorName }}</td>
                                    <td>{{ $liftingRecord->categoryName }}</td>
                                    <td>{{ $liftingRecord->productName }}</td>
                                    <td>{{ $liftingRecord->productSerialNo }}</td>
                                    <td>{{ $liftingRecord->productModelNo }}</td>
                                    <td align="right">{{ $liftingRecord->productQty }}</td>
                                    <td align="right">{{ $liftingRecord->price }}</td>
                                </tr>
                                 @php
                                    $allQty = $allQty + $liftingRecord->productQty;
                                    $allPrice = $allPrice + $liftingRecord->price;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="right" colspan="8"><b>Total</b></td>
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