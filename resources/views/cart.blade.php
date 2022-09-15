@extends('layouts.frontend_master')
@section('content')
  <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{url('cart/update')}}" method="post">
                       @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                $cart_sub_totoal = 0;
                                $flag=0;
                              @endphp
                              @foreach ($carts as $cart)

                                <tr>
                                    <td class="images"><img src="{{ asset('upload/product_photo')}}/{{ App\Product::find($cart->product_id)->product_thumbnail_photo }} "width="50" alt=""></td>
                                    <td class="product"><a href="{{url('product/details')}}/{{ App\Product::find($cart->product_id)->id}}">{{App\Product::find($cart->product_id)->product_name}}(Available Quantity : {{ App\Product::find($cart->product_id)->product_quantity }})</a>
                                      <br>
                                      @if (App\Product::find($cart->product_id)->product_quantity < $cart->quantity)
                                        <span class="text-danger">You have remove Or decrese this product Quantity</span>
                                        @php
                                        $flag++
                                        @endphp
                                      @endif
                                    </td>
                                    <td class="ptice">${{App\Product::find($cart->product_id)->product_price}}</td>
                                    <td class="quantity cart-plus-minus">
                                    <input type="text" value="{{ $cart->quantity }}" name="cart_quantity[{{$cart->id}}]"/>
                                    </td>
                                    <td class="total">${{ (App\Product::find($cart->product_id)->product_price) * ($cart->quantity) }}</td>
                                    @php
                                      $cart_sub_totoal=$cart_sub_totoal + (App\Product::find($cart->product_id)->product_price) * ($cart->quantity);
                                    @endphp
                                    <td class="remove">
                                    <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>

                                    </form>
                                        <li><a href="{{ url('shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="">
                                        <input type="text" placeholder="Cupon Code" id="coupon_text">
                                        <a class="btn btn-danger" id="apply-coupon-btn">Apply Cupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>$ {{$cart_sub_totoal}}</li>
                                        @isset($discountamount)
                                          <li><span class="pull-left"> Discount Amount </span> {{ $discountamount }}%</li>
                                        @endisset
                                        @isset($discountamount)
                                          <li><span class="pull-left"> Total </span>$ {{ $finel_totals = $cart_sub_totoal - ($cart_sub_totoal * ($discountamount/100))}}</li>
                                          @else
                                            {{-- akhane $finel_totals maje $cart_sub_totoal sob data rakhte hobe --}}
                                          <li><span class="pull-left"> Total </span> $ {{$finel_totals = $cart_sub_totoal}}</li>
                                        @endisset
                                    </ul>
                                    @if ($flag==0)

                                      <form action="{{ url('/checkout')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="totals" value="{{$finel_totals }}">
                                        <button type="submit" class="btn btn-danger" >Proceed to Checkout</a>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- cart-area end - --}}
@endsection
