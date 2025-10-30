@extends('Front.base')
<base href="{{ asset('/') }}/">
@section('All_Products')

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('products/' . $product->product_image)}}" alt="" class="rounded">
        </div>

        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                {{ $product->product_name }}
              </h2>
            </div>
            <h4>
              ${{ $product->product_price }}
            </h4>
            <p>
              {{ $product->product_description }}
            </p>
            <div class="btn-box">
              <a href="#" class="btn1">
                Buy Now
              </a>
              <a href="#" class="btn2">
                Add to Cart
              </a>
            </div>
      </div>
    </div>
  </section>

  <!-- end shop section -->

@endsection