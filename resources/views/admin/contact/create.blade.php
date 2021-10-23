@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Contact</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.contact') }}" method="POST"">
                        @csrf
                        <div class="form-group">
                            <label for="address">Contact Address</label>
                            <input type="text" id="address" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="email">Contact Email</label>
                            <input type="text" id="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Phone</label>
                            <input type="text" id="phone" class="form-control" name="phone">
                        </div>
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection