@extends('layouts/app')
@section('content')
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Product Purchasing</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('lifting.add')}}">Add New</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">SL#</th>
                            <th>Voucher No.</th>
                            <th>Voucher Date</th>
                            <th>Vendor Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                    $sl = 1;
                    @endphp
                    @foreach($liftings as $lifting)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$lifting->vaouchar_no}}</td>
                        <td>{{date('d-m-Y',strtotime($lifting->vouchar_date)) }}</td>
                        <td>{{$lifting->vendor->name}}</td>
                        <td>{{$lifting->total_price}}</td>
                        <td>{{$lifting->total_qty}}</td>
                        <td>
                            <a href="{{route('lifting.edit', ['id'=>$lifting->id]) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ route('lifting.delete', ['id' => $lifting->id] ) }}" class="btn btn-xs btn-danger">delete</a> 
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

@stop