@extends('layouts/app')
@section('content')
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Vendor Setup</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('vendor.add')}}">Add New Vendor</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">SL#</th>
                            <th>Vendor Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $sl = 1;
                    @endphp
                    @foreach($vendors as $vendor)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$vendor->name}}</td>
                        <td>{{$vendor->contact_person}}</td>
                        <td>{{$vendor->contact_number}}</td>
                        <td>{{$vendor->email}}</td>
                        <td>{{$vendor->address}}</td>
                        <td>
                            <a href="{{route('vendor.edit', ['id'=>$vendor->id]) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ route('vendor.delete', ['id' => $vendor->id] ) }}" class="btn btn-xs btn-danger">delete</a> 
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