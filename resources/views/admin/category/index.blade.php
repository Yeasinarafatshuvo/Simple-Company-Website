<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row"> 
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">All Category</div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>    
                                @php
                                    $i = 1;
                                @endphp                                    
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstITem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>  
                                    {{-- for query builder --}}
                                    {{-- <td>{{ $category->name }}</td>                 --}}
                                    <td>
                                        @if ($category->created_at == NULL)
                                            <span class="text-danger">No Date</span>
                                            @else
                                            {{ $category->created_at->diffForHumans() }}
                                        @endif
                                       
                                    </td>    
                                    {{-- for query builder --}}
                                    {{-- <td>
                                        @if ($category->created_at == NULL)
                                            <span class="text-danger">No Date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        @endif
                                       
                                    </td>        --}}
                                    <td>
                                        <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr> 
                                @endforeach        
                            </tbody>
                          </table>    
                          {{ $categories->links() }}
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST" class="form">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control">
                                    @error('category_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">Trash List</div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>    
                                @php
                                    $i = 1;
                                @endphp                                    
                                @foreach ($trachChat as $category)
                                <tr>
                                    <th scope="row">{{ $trachChat->firstITem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>  
                                    {{-- for query builder --}}
                                    {{-- <td>{{ $category->name }}</td>                 --}}
                                    <td>
                                        @if ($category->created_at == NULL)
                                            <span class="text-danger">No Date</span>
                                            @else
                                            {{ $category->created_at->diffForHumans() }}
                                        @endif
                                       
                                    </td>    
                                    {{-- for query builder --}}
                                    {{-- <td>
                                        @if ($category->created_at == NULL)
                                            <span class="text-danger">No Date</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        @endif
                                       
                                    </td>        --}}
                                    <td>
                                        <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('category/restore/' .$category->id) }}" class="btn btn-info">Restore</a>
                                        <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">P Delete</a>
                                    </td>
                                </tr> 
                                @endforeach        
                            </tbody>
                          </table>    
                          {{ $categories->links() }}
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
