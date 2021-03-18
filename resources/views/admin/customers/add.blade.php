@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Add New Customer</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('customer.index')}}">Go Back</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('customer.store') }}" method="post">
            	{{ csrf_field() }}
                <div class="form-row">
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Customer Name</label>
                        <input type="text" class="form-control" id="validationCustom03"  name="name" required>
                        <div class="invalid-feedback">
                            Please provide a customer name.
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Customer code</label>
                        <input type="text" class="form-control" id="validationCustom03"  name="code" value="{{$customerCode}}">
                        <div class="invalid-feedback">
                            Please provide a customer person.
                        </div>
                    </div>
                  </div>
                   <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">National ID</label>
                            <input type="text" class="form-control" id="validationCustom03"  name="national_id">
                            <div class="invalid-feedback">
                                Please provide a national Id.
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Phone No.</label>
                            <input type="text" class="form-control" id="validationCustom03"  name="phone">
                            <div class="invalid-feedback">
                                Please provide a phone number.
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 col-12 mb-2">
                            <label for="validationCustom04">Address</label>
                             <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-outline-success float-right" type="submit">Save</button>
                    </div>
                </div>
            		
            </form>
        </div>
    </div>
</div>

@stop