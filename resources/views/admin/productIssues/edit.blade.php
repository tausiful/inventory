@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Update Sales</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('productIssue.index')}}">Go Back</a >
                </div>
            </div>
        </div>
        @php
        $requisitionNo = "";   
        use App\Models\ProductIssue;
        use App\Models\LiftingProduct;
        use App\Models\ProductIssueList;

        $maxProductIssueId = ProductIssue::max('issue_no');

        if (@$maxProductIssueId)
        {
            $productIssueNo = $maxProductIssueId + 1;
        }
        else
        {
            $productIssueNo = 100000000 + 1;
        }

        @endphp

<div class="card-body">
<form class="needs-validation" novalidate action="{{ route('productIssue.update', ['id'=>$issuedProduct->id]) }}" method="post">
        {{ csrf_field() }}
   
    <div class="row">
            <div class="col-md-4">
                <label for="customer">Customers</label>
                <div class="form-group">
                    <select class="form-control chosen-select customer" id="customer" name="customer" required="">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            @php
                                if ($customer->id == $issuedProduct->customer_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                            
                            @endphp
                        <option value="{{$customer->id}}" {{$select}}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div> 
            </div>

            <div class="col-md-4">
                <label for="issue-no">Invoice No</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="productIssueNo" value="{{ $issuedProduct->issue_no }}"readonly/>
                </div>
            </div>

            <div class="col-md-4">
                <label for="issue-date">Sales Date</label>
                <div class="form-group">
                    <input type="text" class="form-control datepicker" name="issueDate"  value="{{ date('d-m-Y', strtotime($issuedProduct->date)) }}" readonly>
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" id="customerId" name="customerId" value="{{ $issuedProduct->customer_id }}">
            </div>
            <div class="col-md-6">
                <input type="hidden" class="form-control row_count" value="0">
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <label></label>
                    <div class="form-group">
                        <table class="table table-bordered table-striped table-sm gridTable issueProductList" >
                            <thead>
                                <tr>
                                    <th width="100px">Product Name (Model)</th>
                                    <th width="180px">Serial No.</th>
                                    <th width="80px">MRP</th>
                                    <th width="80px">Amount</th>
                                    
                                    <th width="10px"><i class="fa fa-trash" style="color: white;"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            @foreach ($issuedProductLists as $issuedProductList)
                            @php
                            $soldSerials = ProductIssueList::where('product_id', $issuedProductList->product_id)
                                ->select(['serial_no'])
                                ->get()
                                ->pluck('serial_no')
                                ->toArray();
                            $notSoldSerials = LiftingProduct::where('product_id', $issuedProductList->product_id)
                                ->whereNotIn('serial_no', $soldSerials)
                                ->select(['serial_no'])
                                ->get()
                                ->pluck('serial_no')
                                ->toArray();
                            array_push($notSoldSerials, $issuedProductList->serial_no);
                            
                             @endphp
                            <tr class="issueProductRow_{{ $issuedProductList->id }} '">                
                                <td>
                                    <input class="productId_{{ $issuedProductList->id }}" type="hidden" name="productId[]" value="{{ $issuedProductList->product_id }}">
                                    <input class="productModel_{{ $issuedProductList->id }}" type="hidden" name="productModel[]" value="{{ $issuedProductList->product->model_no }}">
                                    <input style="text-align: right;" class="productQty productQty_{{ $issuedProductList->id }}" type="hidden" name="productQty[]" value="{{ $issuedProductList->qty }}" readonly>
                                    <input class="productName_{{ $issuedProductList->id }}" type="text" name="productName[]" value="{{ $issuedProductList->product->name }} ({{ $issuedProductList->product->model_no }})" readonly>
                                </td>
                                <td>
                                    <select class="form-control chosen-select productSerialNo_{{ $issuedProductList->id }}" id="productSerialNo_{{ $issuedProductList->id }}" name="productSerial[]">
                                        <option value="">Select Serial No</option>
                                        @foreach ($notSoldSerials as $notSoldSerial)
                                            @php
                                                if ($notSoldSerial == $issuedProductList->serial_no)
                                                {
                                                    $select = "selected";
                                                }
                                                else
                                                {
                                                    $select = "";
                                                }                                            
                                            @endphp
                                            <option value="{{ $notSoldSerial }}" {{ $select }}>{{ $notSoldSerial }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <input style="text-align: right;" class="productPrice productPrice_{{ $issuedProductList->id }}" type="number" name="productPrice[]" value="{{ $issuedProductList->price }}" required readonly>
                                </td> 
                                
                                <td>
                                    <input style="text-align: right;" class="amount amount_{{ $issuedProductList->id }}" type="number" name="amount[]" value="{{ $issuedProductList->amount }}" readonly>
                                </td>
                                <td align="center">
                                    <span class="btn btn-outline-danger btn-sm item_remove" onclick="itemRemove({{$issuedProductList->id }})" style="width: 100%;">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </td>
                               
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="total-qty">Total Quantity</label>
                    <div class="form-group">
                       <input style="text-align: right;" class="form-control totalQty" type="number" name="totalQty" value="{{ $issuedProduct->total_qty }}" readonly>
                   </div>
               </div>

               <div class="col-md-6">
                <label for="taotal-amount">Total Amount</label>
                <div class="form-group">
                    <input style="text-align: right;" class="form-control totalAmount" type="number" name="totalAmount" value="{{ $issuedProduct->total_amount }}" readonly>
                </div>
            </div>
        </div>

       <div class="form-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <button class="btn btn-outline-success float-right" type="submit" style="width: 9%;">Update</button>
      </div>
    </form>
   </div>
    
    @endsection

    @section('custom-js')
    <script type="text/javascript">
        $('#checkButton').click(function(event) {    
            $('.buttonAddEdit').prop("disabled",false); 
            $('.buttonAddEdit').click(); 
        })   

    function itemRemove(i){            
            var issueQty = parseInt($('.issueQty_'+i).val());
            issueQty = issueQty - 1;
            $('.issueQty_'+i).val(issueQty);

            var productPrice = parseFloat($('.productPrice_'+i).val());

            var totalQty = parseInt($('.totalQty').val());
            totalQty = totalQty - 1;
            $('.totalQty').val(totalQty);

            var totalAmount = parseInt($('.totalAmount').val());
            totalAmount = totalAmount - productPrice;
            $('.totalAmount').val(totalAmount);

            $('.issueProductRow_'+i).remove();
}
    </script>
        
    </div>
</div>

@stop