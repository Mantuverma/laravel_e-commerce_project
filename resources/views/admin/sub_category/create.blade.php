@extends('admin.layouts.layout')

@section('admin_page_title')
    Subcategory
@endsection

@section('admin_layout')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> Create Sucategory </h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
        @endif

       
     <form action="{{route('store.subcategories')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="fw-bold mb-2">Category Name</label>
            <input type="text" name="subcategory_name" id="name" class="form-control" placeholder="Enter Category Name">
            
            <label for="name" class="fw-bold mb-2">Select Categories</label>

            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn  btn-primary w-100 mt-3">Add Sub Category</button>

        </div>


     </form>

    </div>
</div>

    
@endsection