@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row"> 
                <a href="{{ route('admin.addcontact') }}" class="btn btn-info ml-4 mb-3">Add Contact</a>
               
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
                        <div class="card-header">All Contact Data</div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" width="5%">SL No</th>
                                <th scope="col" width="15%">Contact Address</th>
                                <th scope="col" width="15%">Contact Email</th>
                                <th scope="col" width="15%">Contact Phone</th>
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        
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