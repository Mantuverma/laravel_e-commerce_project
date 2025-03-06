@extends('admin.layouts.layout')

@section('admin_page_title')
    Update Attribute
@endsection

@section('admin_layout')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Update Attribute </h5>
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

       
     {{-- <form action="{{route('store.update',$category->$id)}}" method="POST"> --}}
        <form action="{{ route('update.productattribute', $attribute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="attribute_name" class="fw-bold mb-2">Category Name</label>
            <input type="text" name="attribute_name" id="name" class="form-control" value="{{$attribute->attribute_name}}" placeholder="Enter Category Name">
            <button type="submit" class="btn  btn-primary w-100 mt-3">Update Category</button>

        </div>


     </form>

    </div>
</div>

    
@endsection