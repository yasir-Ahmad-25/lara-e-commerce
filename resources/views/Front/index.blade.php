@extends('Front.base')

@section('Home')


  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($Latest_products as $latest_product)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <a href="{{ route('product_details', $latest_product->id) }}">
                <div class="img-box">
                  <img src="{{ asset('products/' . $latest_product->product_image )}}" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ ucfirst($latest_product->product_name) }}
                  </h6>
                  <h6>
                    Price
                    <span>
                      ${{ $latest_product->product_price }}
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
      <div class="btn-box">
        <a href="{{ route('view_all_products')}}">
          View All Products
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->


    <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="#">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>

  <!-- end contact section -->

@endsection