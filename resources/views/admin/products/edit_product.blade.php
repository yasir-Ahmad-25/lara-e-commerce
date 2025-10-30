@extends('admin.admin_base')
<base href="{{ url('/') }}/">

@section('edit_product')
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update_product',$product->id )}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="#">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" value="{{ $product->product_name }}">
        </div>

        <div class="form-group">
            <label for="#">Product Description</label>
            <textarea name="product_description" id="product_description" class="form-control" placeholder="Enter Product Name">{{ $product->product_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="#">Product Qty</label>
            <input type="decimal" name="product_qty" id="product_qty" class="form-control" placeholder="Enter Product Qty" value="{{ $product->product_qty }}">
        </div>

        <div class="form-group">
            <label for="#">Product Price</label>
            <input type="decimal" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price ($)" value="{{ $product->product_price }}">
        </div>
        
        <div class="form-group">
            <label for="#">Product Category</label>
            <select name="product_category" id="product_category" class="form-control">
                <option selected disabled> Select Product Category </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group d-block">
                    <label for="#">Current Image</label> <br>
                    <img src="{{ asset('products/'.$product->product_image)}}" alt="" width="50%" height="50%" class="rounded">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="#">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">
                </div>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>
@endsection