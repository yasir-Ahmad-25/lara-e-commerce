@extends('admin.admin_base')

@section('edit-category')

    <div class="container-fluid">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
            ✅ {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
            ❌ {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.update_category',$category->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="#">Category Name</label>
                <input type="text" name="category_name" id="category_name" placeholder="Enter Category Name" class="form-control" value="{{ $category->category_name }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
