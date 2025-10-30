@extends('admin.admin_base')

@section('view_products')
<div class="container-fluid">
    <table class="table table-light table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td><img src="{{ asset('products/'. $product->product_image)}}" alt="product_image" width="25%" height="25%" class="rounded"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->product_description }}</td>
                    <td>{{ $product->product_qty }}</td>
                    <td>$ {{ $product->product_price }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit_product',$product->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            {{ $products->links() }}
        </tbody>
    </table>
</div>
@endsection