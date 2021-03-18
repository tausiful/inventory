@extends('layouts/app')

@section('content')

@php
        $serialNo = "";     
        $productSerialNo = "";     
        use App\Models\Lifting;
        use App\Models\LiftingProduct;

        $purchaseBy = Auth::user()->name;

        $maxLifting = Lifting::max('serial_no');

        if (@$maxLifting)
        {
            $serialNo = $maxLifting + 1;
        }
        else
        {
            $serialNo = 1000000 + 1;
        }

        $maxLiftingProduct = LiftingProduct::max('serial_no');

        if (@$maxLiftingProduct)
        {
            $productSerialNo = $maxLiftingProduct;
        }
        else
        {
            $productSerialNo = 10000000000000;
        }
    @endphp
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Add Product Purchase</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('lifting.index')}}">Go Back</a >
                </div>
            </div>
        </div>

    <div class="card-body">
       <form class="needs-validation" novalidate action="{{ route('lifting.update', ['id' => $lifting->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="hidden" id="productSerialNo" name="productSerialNo" value="{{ $productSerialNo }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="sl-no">SL No</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="serialNo" value="{{ $serialNo }}" required readonly/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom01">Voucher No</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="voucharNo" value="{{ $lifting->vaouchar_no }}" id="validationCustom01" required>
                        </div>
                        <div class="invalid-feedback">
                            Voucher No is required.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="vaouchar-date">Vouchar Date</label>
                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="voucherDate" value="{{ date('d-m-Y',strtotime($lifting->vouchar_date)) }}" readonly>
                        </div>
                    </div>
                           
                </div>

                <div class="form-row">
                    <div class="col-md-4">
                        <label for="supplier">Vendor</label>
                        <div class="form-group">
                            <select class="form-control chosen-select" name="vendorId" required>
                                <option value="">Select Vendor</option>
                                @foreach ($vendors as $vendor)
                                    @php
                                        if ($vendor->id == $lifting->vendor_id)
                                        {
                                            $select = 'selected';
                                        }
                                        else
                                        {
                                            $select = '';
                                        }                                       
                                    @endphp
                                    <option value="{{$vendor->id}}" {{ $select }}>{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a Vendor.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="purchase-by">Purchase By</label>
                        <div class="form-group">
                            <input  type="text" class="form-control" name="purchaseBy" value="{{ $purchaseBy }}" required readonly>
                        </div>
                    </div>

                     <div class="col-md-4">
                        <label for="submission-date">Submission Date</label>
                        <div class="form-group">
                            <input type="text" class="form-control datepicker" name="submissionDate" value="{{ date('d-m-Y',strtotime($lifting->submission_date)) }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-8">
                        <label for="supplier">Products</label>
                        <div class="form-group">
                            <select class="form-control chosen-select" id="product" name="product_d">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{ $product->name }} ({{ $product->model_no }} )</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=""></label>
                        <div class="form-group">
                            <input type="hidden" class="row_count" value="0">
                            <span class="btn btn-outline-success add_item" style="width: 100%;">
                                <i class="fa fa-arrow-down"></i> Add More
                            </span>
                        </div>
                    </div>
                    <input  type="hidden" class="form-control" id="product_serial_no" name="product_serial_no" value="">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="supplier">Total Quantity</label>
                        <div class="form-group">
                            <input style="text-align: right;" class="form-control totalQty" type="number" name="totalQty" value="{{ $lifting->total_qty }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="supplier">Total Price</label>
                        <div class="form-group">
                            <input style="text-align: right;" class="form-control totalPrice" type="number" name="totalPrice" value="{{ $lifting->total_price }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="supplier">Total MRP Price</label>
                        <div class="form-group">
                            <input style="text-align: right;" class="form-control totalMrpPrice" type="number" name="totalMrpPrice" value="{{ $lifting->total_mrp_price }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for=""></label>
                        <div class="form-group">
                            <table class="table table-bordered table-striped gridTable" >
                                <thead>
                                    <tr>
                                        <th width="60px">Product Name & Model</th>
                                        <th width="60px">Serial No</th>
                                        <th width="80px">Price</th>
                                        <th width="90px">MRP Price</th>
                                        <th width="10px"><i class="fa fa-trash" style="color: red;"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($liftingProducts as $liftingProduct)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr id="itemRow_{{ $i }}">                
                                            <td>
                                                <input class="productId_{{ $i }}" type="hidden" name="productId[]" value="{{ $liftingProduct->product_id }}">
                                                <input class="productName_{{ $i }}" type="text" name="productName[]" value="{{ $liftingProduct->productName }}" required readonly="">
                                                 <input class="productModel_{{ $i }}" type="hidden" name="productModel[]" value="{{ $liftingProduct->model_no }}" readonly>
                                            </td>
                                          
                                            <td>
                                                <input class="productSerialNo_{{ $i }}" type="text" name="productSerialNo[]" value="{{ $liftingProduct->serial_no }}" required readonly="">
                                            </td>

                                            <td>
                                                <input class="productQty productQty_{{ $i }}" type="hidden" name="productQty[]" value="{{ $liftingProduct->qty }}" required>
                                                <input style="text-align: right;" class="productPrice productPrice_{{ $i }}" type="number" name="productPrice[]" value="{{ $liftingProduct->price }}" oninput="findMrpHairePrice({{ $i }})" required readonly="">
                                            </td>

                                            <td>
                                                <input style="text-align: right;" class="productMrpPrice productMrpPrice_{{ $i }}" type="number" name="productMrpPrice[]" value="{{ $liftingProduct->mrp }}" readonly="">
                                            <td align="center">
                                                <span class="btn btn-outline-danger btn-sm item_remove" onclick="itemRemove({{ $i }})" style="width: 100%;">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </br>
                            <div class="form-row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="btn btn-outline-success float-right" type="submit" style="width: 9%;">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        // $('#formAddEdit').submit(function(){
        //     if ($('#storeOrShowroom').val() == "")
        //     {
        //         swal("Please! Select Store Or Showroom", "", "warning");
        //         return false;
        //     }
        // });

        $(".add_item").click(function () {
            var productId = $("#product option:selected").val();

            if (productId == "")
            {
                swal("Please! Select A Product", "", "warning");
            }
            else
            {
                var row_count = $('.row_count').val();
                var total = parseInt(row_count) + 1;
                if (total > 400)
                {
                    swal("You Can't Lifting Product More Than 400", "", "warning");                    
                }
                else
                {
                    if ($("#product_serial_no").val() == "")
                    {
                        var productSerialNo = parseInt($('#productSerialNo').val()) + 1;
                        var serialNo = productSerialNo;
                        $('#productSerialNo').val(productSerialNo);
                    }
                    else
                    {
                        var serialNo = $("#product_serial_no").val();
                    }

                    $(".gridTable tbody").append(
                        '<tr id="itemRow_' + total + '">' +                
                            '<td>'+
                                '<input class="productId_'+total+'" type="hidden" name="productId[]" value="">'+
                                '<input class="productModel_'+total+'" type="hidden" name="productModel[]" value="" readonly>'+
                                '<input class="productName_'+total+'" type="text" name="productName[]" value="" readonly>'+
                            '</td>'+
                            '<td>'+
                                '<input class="productSerialNo_'+total+'" type="text" name="productSerialNo[]" value="" readonly>'+
                            '</td>'+

                            '<td>'+
                                '<input class="productQty_'+total+'" type="hidden" name="productQty[]" value="1">'+
                                '<input style="text-align: right;" class="productPrice productPrice_'+total+'" type="number" name="productPrice[]" value="" oninput="findMrpHairePrice('+total+')" readonly>'+
                            '</td>'+

                            '<td>'+
                                '<input style="text-align: right;" class="productMrpPrice productMrpPrice_'+total+'" type="number" name="productMrpPrice[]" value="" readonly>'+
                            '</td>'+
                            '<td align="center">'+
                                '<span class="btn btn-outline-danger btn-sm item_remove" onclick="itemRemove('+total+')" style="width: 100%;">'+
                                    '<i class="fa fa-trash"></i>'+
                                '</span>'+
                            '</td>'+
                        '</tr>'
                    );

                    $('.row_count').val(total);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: "{{ route('lifting.productInfo') }}",
                        data:{productId:productId},
                        success: function(response) {
                            var product = response.product;
                            var pdtModel = product.name+' ('+product.model_no+')';

                            $('.productId_'+total).val(product.id);
                            $('.productName_'+total).val(pdtModel);
                            $('.productModel_'+total).val(product.model_no);
                            $('.productSerialNo_'+total).val(serialNo);
                            // $('.price_'+total).val(product.price);
                            $('.productPrice_'+total).val(product.cost_price);
                            $('.productMrpPrice_'+total).val(product.mrp);

                            var totalQty = parseFloat($('.totalQty').val()) + parseFloat($('.productQty_'+total).val());
                            var totalPrice = parseFloat($('.totalPrice').val()) + parseFloat($('.productPrice_'+total).val());
                            var totalMrpPrice = parseFloat($('.totalMrpPrice').val()) + parseFloat($('.productMrpPrice_'+total).val());
                           
                            $('.totalQty').val(totalQty);
                            $('.totalPrice').val(Math.round(totalPrice));
                            $('.totalMrpPrice').val(Math.round(totalMrpPrice));
                        },
                        error: function(response) {

                        }
                    });

                    $('#product_serial_no').val('').focus();
                }
            }            
        });

        function findMrpHairePrice(i)
        {
            if ($(".productPrice_"+i).val() == "")
            {
                var price = 0
            }
            else
            {
                var price = parseFloat($(".productPrice_"+i).val());
            }

            var mrpPrice = price + (price * 8)/100;
            // var hairePrice = mrpPrice + (mrpPrice * 12)/100;
            $(".productMrpPrice_"+i).val(Math.round(mrpPrice));
            // $(".productHairePrice_"+i).val(Math.round(hairePrice));

            rowSum();
        }

        function rowSum()
        {
            var totalPrice = 0;            
            var totalMrpPrice = 0;           
            $(".productPrice").each(function () {
                var price = parseFloat($(this).val());
                totalPrice += isNaN(price) ? 0 : price;
            });

            $(".productMrpPrice").each(function () {
                var mrpPrice = parseFloat($(this).val());
                totalMrpPrice += isNaN(mrpPrice) ? 0 : mrpPrice;
            });

            $('.totalPrice').val(totalPrice);
            $('.totalMrpPrice').val(Math.round(totalMrpPrice));
        }

        function itemRemove(i) {
            var totalQty = parseFloat($('.totalQty').val());
            var totalPrice = parseFloat($('.totalPrice').val());
            var totalMrpPrice = parseFloat($('.totalMrpPrice').val());

            var quantity = parseFloat($('.productQty_'+i).val());
            var productPrice = parseFloat($('.productPrice_'+i).val());
            var productMrpPrice = parseFloat($('.productMrpPrice_'+i).val());

            totalQty = totalQty - quantity;
            totalPrice = totalPrice - productPrice;
            totalMrpPrice = totalMrpPrice - productMrpPrice;

            $('.totalQty').val(totalQty);
            $('.totalPrice').val(totalPrice.toFixed(2));
            $('.totalMrpPrice').val(totalMrpPrice.toFixed(2));

            $("#itemRow_" + i).remove();
            $('#product_serial_no').val('').focus();
        }          
    </script>









       
    </div>
</div>

@stop