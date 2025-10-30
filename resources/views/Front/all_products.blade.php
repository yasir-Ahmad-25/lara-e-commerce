@extends('Front.base')

@section('All_Products')

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      
      <div class="row">
        @foreach ($all_products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <a href="{{ route('product_details', $product->id) }}">
                <div class="img-box">
                  <img src="{{ asset('products/' . $product->product_image )}}" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ ucfirst($product->product_name) }}
                  </h6>
                  <h6>
                    <span>
                      ${{ $product->product_price }}
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- end shop section -->

@endsection