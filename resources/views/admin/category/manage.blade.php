@extends('admin.layouts.layout')

@section('admin_page_title')
    Dashboard -Category
@endsection

@section('admin_layout')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> All Category </h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->category_name}}</td>
                    <td> 
                      
                        <a href="{{route('store.edit',$category->id)}}" class="btn btn-primary mr-2">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
          </table>
      </div>
    </div>
</div>

    
@endsection