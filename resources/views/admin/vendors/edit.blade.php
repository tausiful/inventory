@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Update Vendor</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('vendor.index')}}">Go Back</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('vendor.update', ['id'=>$vendor->id]) }}" method="post">
            	{{ csrf_field() }}
                <div class="form-row">
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Vendor Name</label>
                        <input type="text" class="form-control" id="validationCustom03"  name="name" value="{{$vendor->name}}" required>
                        <div class="invalid-feedback">
                            Please provide a vendor name.
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Contact Person</label>
                        <input type="text" class="form-control" id="validationCustom03"  name="contact_person" value="{{$vendor->contact_person}}">
                        <div class="invalid-feedback">
                            Please provide a contact person.
                        </div>
                    </div>
                  </div>
                   <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom03"  name="contact_number" value="{{$vendor->contact_number}}">
                            <div class="invalid-feedback">
                                Please provide a contact number.
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Email</label>
                            <input type="email" class="form-control" id="validationCustom03"  name="email" value="{{$vendor->email}}">
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 col-12 mb-2">
                            <label for="validationCustom04">Address</label>
                             <textarea class="form-control" name="address">{{$vendor->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-outline-success float-right" type="submit">Update</button>
                    </div>
                </div>
            		
            </form>
        </div>
    </div>
</div>

@stop