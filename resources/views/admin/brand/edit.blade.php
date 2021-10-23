@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <div class="card-header">
                Edit Brands
            </div>
                @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>        
                @endif
            <div class="card-body">
                <form action="{{ url('brand/update/' .$brands->id) }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{ $brands->brand_name }}">
                    </div>
                    <div class="form-group">
                        <label for="brand_image">Brand Image</label>
                        <input type="file" name="brand_image" class="form-controller" id="brand_image">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($brands->brand_image) }}" alt="" style="width: 400px; height:200px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection