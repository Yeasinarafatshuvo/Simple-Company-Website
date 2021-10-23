@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Basic Form Controls</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Slider Title</label>
                            <input type="text" id="title" class="form-control" name="title" placeholder="Slider Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Slider Description</label>
                            <textarea class="form-control"  id="" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Slider Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection