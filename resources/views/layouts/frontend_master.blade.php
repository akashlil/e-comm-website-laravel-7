
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('frontend_assets')}}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--Start Preloader-->
    {{-- <div class="preloader-wrap">
        <div class="spinner"></div>
    </div> --}}
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{url('customer/register')}}">Register</a></li>
                                    <li><a href="{{ url('/cart') }}">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('customer/register')}}">Customer Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                        <img src="{{asset('frontend_assets')}}/images/logo.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About</a></li>
                                <li><a href="{{ url('shop') }}">Shop</a></li>
                                {{-- <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{url('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>

                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>
                                  {{ App\Cart::where('ip_address',request()->ip())->count() }}
                                </span></a>

                                <ul class="cart-wrap dropdown_style">
                                  @php
                                    $sub_totla= 0 ;
                                  @endphp
                                  @foreach (App\Cart::all() as $cart)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img width="40"src="{{ asset('upload/product_photo')}}/{{ App\Product::find($cart->product_id)->product_thumbnail_photo }} " alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ url('cart') }}">{{App\Product::find($cart->product_id)->product_name}}</a>
                                            <span>QTY : {{ $cart->quantity }}</span>
                                            <p>${{ (App\Product::find($cart->product_id)->product_price) * ($cart->quantity) }}</p>
                                            {{--start sub_total --}}
                                            @php
                                            $sub_totla= $sub_totla + (App\Product::find($cart->product_id)->product_price * $cart->quantity)
                                            @endphp
                                          {{--end sub_total --}}
                                            <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                  @endforeach

                                  <li>Subtotol: <span class="pull-right">${{$sub_totla}}</span></li>
                                    <li>
                                        <a href="{{ url('cart') }}" class="btn btn-danger">Check Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->
@yield('content')

    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                {{-- <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="{{ url('/contact') }}">contact</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright ?? {{ Carbon\Carbon::Now() }} Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- Modal area start -->
    @foreach (App\Product::all() as $product)


    <div class="modal fade" id="product_id{{$product->id}}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{asset('upload/product_photo')}}/{{ $product->product_thumbnail_photo  }}" alt="">
                    </div>
                    <div class="product-single-content w-50 ">
                        <h3>{{ $product->product_name  }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{ $product->product_price  }}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>

                        <p>{{ $product->product_long_description}} </p>
                        <ul class="input-style">

                          @if ($product->product_quantity == 0)
                            <div class="alert alert-danger">
                              <p>This product is not available</p>
                            </div>
                            @else
                              <form action="{{ url('add/to/cart') }}" method="post">
                                            @csrf
                                <input  type="hidden" value="{{ $product->id }}" name="product_id" />

                                <li class="quantity cart-plus-minus">
                                    <input  type="text" value="1"  name="quantity"/>
                                </li>
                                  <li>
                                    <button type="submit"
                                    style="
                                    width: 150px;
                                    left:  20px;
                                    height: 70px;"
                                      class=" btn btn-danger" >Add to Cart</button>

                                  </li>
                                </form>
                          @endif

                        </ul>

                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li>
                            {{ App\Category::find($product->category_id)->category_name }}</li>

                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

        @endforeach
    <!-- Modal area start -->

    <!-- jquery latest version -->
    <script src="{{asset('frontend_assets')}}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend_assets')}}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{asset('frontend_assets')}}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{asset('frontend_assets')}}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{asset('frontend_assets')}}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{asset('frontend_assets')}}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{asset('frontend_assets')}}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{asset('frontend_assets')}}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{asset('frontend_assets')}}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{asset('frontend_assets')}}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{asset('frontend_assets')}}/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{asset('frontend_assets')}}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{asset('frontend_assets')}}/js/scripts.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#apply-coupon-btn').click(function(){
      var coupon_text= $('#coupon_text').val();
      var link_to_go ="{{ url('cart') }}/"+coupon_text;
      window.location.href = link_to_go;
      });
    });
    </script>
  </body>


  <!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
  </html>

  </html>
