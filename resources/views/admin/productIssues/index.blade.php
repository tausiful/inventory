@extends('layouts/app')
@section('content')
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Product Sales</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('productIssue.add')}}">Add New</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">SL#</th>
                            <th>Date</th>
                            <th>Invoice No.</th>
                            <th>Customer Name</th>
                            <th>Total Quantity</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                    $sl = 1;
                   
                    @endphp
                    @foreach($issuedProducts as $issuedProduct)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{date('d-m-Y',strtotime($issuedProduct->date)) }}</td>
                        <td>{{$issuedProduct->issue_no}}</td>
                        <td>{{$issuedProduct->customer->name}}</td>
                        <td>{{$issuedProduct->total_qty}}</td>
                        <td>{{$issuedProduct->total_amount}}</td>
                        <td>
                            <a href="{{route('productIssue.edit', ['id'=>$issuedProduct->id]) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ route('productIssue.delete', ['id' => $issuedProduct->id] ) }}" class="btn btn-xs btn-danger">delete</a> 
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