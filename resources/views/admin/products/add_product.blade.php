@extends('admin.admin_base')

@section('add_product')
<div class="container-fluid">
 
    @if (session('message'))
         <div class="alert alert-success" role="alert">
            ✅ {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
         <div class="alert alert-success" role="alert">
            ❌ {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ route('admin.create_product')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="#">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name">
        </div>

        <div class="form-group">
            <label for="#">Product Description</label>
            <textarea name="product_description" id="product_description" class="form-control" placeholder="Enter Product Name"></textarea>
        </div>

        <div class="form-group">
            <label for="#">Product Qty</label>
            <input type="decimal" name="product_qty" id="product_qty" class="form-control" placeholder="Enter Product Qty">
        </div>

        <div class="form-group">
            <label for="#">Product Price</label>
            <input type="decimal" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price ($)">
        </div>
        
        <div class="form-group">
            <label for="#">Product Category</label>
            <select name="product_category" id="product_category" class="form-control">
                <option selected disabled> Select Product Category </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="#">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
</div>
@endsection