@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Add Sales</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('productIssue.index')}}">Go Back</a >
                </div>
            </div>
        </div>

        @php
$requisitionNo = "";   
use App\Models\ProductIssue;

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
<form class="needs-validation" novalidate action="{{ route('productIssue.store') }}" method="post">
        {{ csrf_field() }}
    
    <div class="row">
            <div class="col-md-4">
                <label for="customer">Customers</label>
                <div class="form-group">
                    <select class="form-control chosen-select customer" id="customer" name="customer" required="">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                        <option value="{{$customer->id}}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div> 
            </div>

            <div class="col-md-4">
                <label for="issue-no">Invoice No</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="productIssueNo" value="{{ $productIssueNo }}" required readonly/>
                </div>
            </div>

            <div class="col-md-4">
                <label for="issue-date">Sales Date</label>
                <div class="form-group">
                    <input type="text" class="form-control add_datepicker" name="issueDate" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" id="customerId" name="customerId" value="" readonly>
            </div>
            <div class="col-md-6">
                <input type="hidden" class="form-control row_count" value="0">
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <label for="product">Products</label>
            <div class="form-group" id="product-select-menu">
                <select class="form-control chosen-select product" id="product" name="product" required="">
                    <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{ $product->name }} ( {{ $product->code }} - {{ $product->color }} - {{ $product->model_no }}  )</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4" id="serialNoSection">
                    <label for="serial-no">Serial No</label>
                    <div class="form-group" id="serial-no-select-menu">
                        <select class="form-control chosen-select serialNo" id="serialNo" name="serialNo" >
                            <option value="">Select Serial No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4" id="addProductSection">
                      <label ></label>
                    <span class="btn btn-outline-success addItem" style="width: 100%;">
                        <i class="fa fa-arrow-down"></i> Add Product
                    </span>
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
                                    
                                    <th width="10px"><i class="fa fa-trash" style="color: red;"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="total-qty">Total Quantity</label>
                    <div class="form-group">
                       <input style="text-align: right;" class="form-control totalQty" type="number" name="totalQty" value="0" readonly>
                   </div>
               </div>

               <div class="col-md-6">
                <label for="taotal-amount">Total Amount</label>
                <div class="form-group">
                    <input style="text-align: right;" class="form-control totalAmount" type="number" name="totalAmount" value="0" readonly>
                </div>
            </div>
        </div>

       <div class="form-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <button class="btn btn-outline-success float-right" type="submit" style="width: 9%;">Save</button>
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


        $(document).on('change', '#product', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var productId = $('#product').val();

            $.ajax({
                type:'post',
                url:'{{ route('productIssue.productSerialInfo') }}',
                data:{productId:productId},
                success:function(data){

                    var productSerials = data.productSerials;

                    var productSerialOption = '';
                    if (productSerials)
                    {
                        productSerialOption += '<select class="form-control chosen-select serialNo" id="serialNo" name="serialNo">';
                        productSerialOption += '<option value="">Select Serial No</option>';          
                        for (productSerial of productSerials)
                        {
                            if (productSerial.serial_no != $('.serialNo_'+productSerial.serial_no).val())
                            {
                                productSerialOption += '<option id="serialNo_'+productSerial.serial_no+'" value="'+productSerial.serial_no+'">'+productSerial.serial_no+'</option>';
                            }
                        }
                        productSerialOption += '</select>';         
                    }
                    else
                    {
                        productSerialOption += '<select class="form-control chosen-select serialNo" id="serialNo" name="serialNo">';
                        productSerialOption += '<option value="">Select Serial No</option>';
                        productSerialOption += '</select>';
                    } 
                    $('#serial-no-select-menu').html(productSerialOption);
                    $(".chosen-select").chosen();
                }
            });
        });

$(document).on('change', '#customer', function(){
    var customerId = $("#customer option:selected").val();
    $("#customerId").val(customerId);
    $('.issueProductRow').remove();
    $('#product').val("").trigger('chosen:updated');
    $('#serialNo').val("").trigger('chosen:updated');
});

$(".addItem").click(function () {
    if ($("#customer option:selected").val() == "")
    {
        swal("Please! Select A Customer", "", "warning");
    }
    else
    {
        if ($("#product option:selected").val() == "")
        {
            swal("Please! Select A Product", "", "warning");
        }
        else
        {
            if ($("#serialNo option:selected").val() == "")
            {
                swal("Please! Select A Serial", "", "warning");
            }
            else
            {
                var productId = $("#product option:selected").val();
                var customerId = $("#customerId").val();
                var serialNo = $(".serialNo").val();

                var row_count = $('.row_count').val();
                var total = parseInt(row_count) + 1;

                $(".issueProductList tbody").append(
                    '<tr class="issueProductRow" id="issueProductRow_'+total+'">' +                
                    '<td>'+
                    '<input class="productId_'+total+'" type="hidden" name="productId[]" value="">'+
                    '<input class="productModel_'+total+'" type="hidden" name="productModel[]" value="" readonly>'+
                    '<input style="text-align: right;" class="productQty productQty_'+total+'" type="hidden" name="productQty[]" value="1" readonly>'+
                    '<input class="productName_'+total+'" type="text" name="productName[]" value="" readonly>'+
                    '</td>'+
                    
                    '<td>'+
                    '<input class="productSerial_'+total+'" type="text" name="productSerial[]" value="" readonly>'+
                    // '<input class="serialNo_'+serialNo+'" type="hidden" name="productSerial[]" value="'+serialNo+'" readonly>'+
                    '</td>'+

                    '<td>'+
                    '<input style="text-align: right;" class="productPrice productPrice_'+total+'" type="number" name="productPrice[]" value="" required readonly>'+
                    '</td>'+
                    '<td>'+
                    '<input style="text-align: right;" class="amount amount_'+total+'" type="number" name="amount[]" value="" readonly>'+
                    '</td>'+
                    '<td align="center">'+
                    '<span class="btn btn-outline-danger btn-sm item_remove" onclick="withoutApprovalRowRemove('+total+')" style="width: 100%;">'+
                    '<i class="fa fa-trash"></i>'+
                    '</span>'+
                    '</td>'+
                    '</tr>'
                    );
                $('.serialNo option[value='+serialNo+']').remove();
                $('.serialNo').trigger('chosen:updated');
                $('.row_count').val(total);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('productIssue.productInfo') }}",
                    data:{productId:productId,customerId:customerId},
                    success: function(response) {
                        
                        var product = response.product;
                        var commissionRate = response.commissionRate;
                        var offerRate = response.offerRate;
                        var netAmount = response.netAmount;
                        var pdtModel = product.name+' ('+product.model_no+')';

                        $('.productId_'+total).val(product.id);
                        $('.productName_'+total).val(pdtModel);
                        $('.productModel_'+total).val(product.model_no);
                        $('.productSerial_'+total).val(serialNo);
                        $('.productPrice_'+total).val(product.mrp);
                        $('.amount_'+total).val(product.mrp);

                        var totalQty = parseInt($('.totalQty').val());
                        totalQty = totalQty + 1;
                        $('.totalQty').val(totalQty);

                        var totalAmount = parseFloat($('.totalAmount').val());
                        totalAmount = totalAmount + parseFloat(product.mrp);
                        $('.totalAmount').val(totalAmount.toFixed(2));
                    },
                    error: function(response) {

                    }
                });
            }
        }
    }            
});
function withoutApprovalRowRemove(i)
{
    var totalQty = parseFloat($('.totalQty').val());
    totalQty = totalQty - 1;
    $('.totalQty').val(totalQty);

    var productPrice = parseFloat($('.amount_'+i).val());
    var totalAmount = parseFloat($('.totalAmount').val());
    console.log(productPrice);
    // console.log(totalAmount);

    totalAmount = totalAmount - productPrice;
    $('.totalAmount').val(totalAmount);

    var serialNo = $('.productSerial_'+i).val();

    $('.serialNo').append(
        '<option id="serialNo_'+serialNo+'" value="'+serialNo+'">'+serialNo+'</option>'
        );
    
    $('.serialNo').trigger('chosen:updated');

    $('#issueProductRow_'+i).remove();
}   

    </script>
        
    </div>
</div>

@stop