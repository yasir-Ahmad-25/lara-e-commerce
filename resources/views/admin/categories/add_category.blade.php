@extends('admin.admin_base')

@section('add_category')
    <div class="container-fluid">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
            ✅ {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('admin.post_category')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="#">Category Name</label>
                <input type="text" name="category_name" id="category_name" placeholder="Enter Category Name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add New Category</button>
        </form>
    </div>
@endsection
