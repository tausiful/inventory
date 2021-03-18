@extends('layouts/app')
@section('content')
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0">Category Setup</h3>
                </div>
                <div class="col-md-6">
                    <a type="button" class="btn btn-outline-primary float-right" href="{{route('category.add')}}">Add New Category</a >
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">SL#</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $sl = 1;
                    @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('category.edit', ['id'=>$category->id]) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ route('category.delete', ['id' => $category->id] ) }}" class="btn btn-xs btn-danger">delete</a>
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