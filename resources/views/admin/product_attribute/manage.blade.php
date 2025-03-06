@extends('admin.layouts.layout')

@section('admin_page_title')
    Manage SubCategory
@endsection

@section('admin_layout')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> All Subcategory </h5>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}              
    </div>
    @endif
    <div class="card-body">
      <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Attribute Name </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attribute as $attr)
                <tr>
                    <th scope="row">{{$attr->id}}</th>
                    <td>{{$attr->attribute_name}}</td>
                    <td> 
                      
                       <div class="d-flex">
                        <a href="{{route('store.edit.productattribute',$attr->id)}}" class="btn btn-primary mr-10">Edit</a>
                        <form action="{{route('delete.productattribute',$attr->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" value="Delete">Delete</button>
                        </form>
                        </div>
                        {{-- <a href="{{route('store.delete',$category->id)}}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
          </table>
      </div>
    </div>
</div>

    
@endsection