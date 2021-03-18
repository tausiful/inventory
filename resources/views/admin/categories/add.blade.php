@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Add New Category</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('category.index')}}">Go Back</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('category.store') }}" method="post">
            	{{ csrf_field() }}
                <div class="form-row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Category Name</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Category Name" name="name" required>
                        <div class="invalid-feedback">
                            Please provide a category name.
                        </div>
                    </div>
                  </div>
                   <div class="form-row">
                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-12 col-12 mb-2">
                        <label for="validationCustom04">Description</label>
                         <textarea class="form-control" name="description"></textarea>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <button class="btn btn-outline-success float-right" type="submit">Save</button>
                    </div>
                </div>
            		
            </form>
        </div>
    </div>
</div>

@stop