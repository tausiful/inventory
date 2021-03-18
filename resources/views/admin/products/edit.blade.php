@extends('layouts/app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Update New Product</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('product.index')}}">Go Back</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('product.update', ['id' => $product->id]) }}" method="post">
            	{{ csrf_field() }}
                <div class="form-row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label >Select Category Name</label>
                        <select class="form-control" name="category_id"  required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected="selected" @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a category.
                        </div>
                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Product Name</label>
                        <input type="text" class="form-control" id="validationCustom03"  name="name" value="{{$product->name}}" required>
                        <div class="invalid-feedback">
                            Please provide a product name.
                        </div>
                    </div>
                  </div>
                   <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Product Model</label>
                            <input type="text" class="form-control" id="validationCustom03"  name="model_no" value="{{$product->model_no}}" required>
                            <div class="invalid-feedback">
                                Please provide a product name.
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-12 col-12 mb-2">
                            <label for="validationCustom04">Description</label>
                             <textarea class="form-control" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">Cost Price</label>
                            <input type="number" class="form-control" id="validationCustom03"  name="cost_price"  value="{{$product->cost_price}}" required>
                            <div class="invalid-feedback">
                                Please provide a produuct cost price.
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                            <label for="validationCustom03">MRP</label>
                            <input type="number" class="form-control" id="validationCustom03"  name="mrp" value="{{$product->mrp}}" required>
                            <div class="invalid-feedback">
                                Please provide a product MRP.
                            </div>
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