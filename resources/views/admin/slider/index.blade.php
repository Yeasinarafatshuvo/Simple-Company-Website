@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row"> 
                <a href="{{ route('add.slider') }}" class="btn btn-info ml-4 mb-3">Add Slider</a>
               
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">All Slider</div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" width="5%">SL No</th>
                                <th scope="col" width="15%">Slider Title</th>
                                <th scope="col" width="25%">Slider Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ asset($slider->image) }}" style="height: 40px; width:70px" alt=""></td>
                                       
                                        <td>
                                            <a href="" class="btn btn-info">Edit</a>
                                            <a href="" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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

    
@endsection