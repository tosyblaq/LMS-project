@extends('layouts.front')

@section('content')
<div class="container-fluid">
	<div class="row medium-padding120 bg-border-color">
		<div class="container">

			<div class="row">

				<div class="col-lg-12">
			<div class="order">
				<h2 class="h1 order-title text-center">Your Order</h2>
				<form action="#" method="post" class="cart-main">
					<table class="shop_table cart">
						<thead class="cart-product-wrap-title-main">
						<tr>
							<th class="product-thumbnail">Course</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>
						</tr>
						</thead>
						<tbody>

						@foreach (Cart::content() as $product)
                            <tr class="cart_item">

                                <td class="product-thumbnail">

                                    <div class="cart-product__item">
                                        <div class="cart-product-content">
											<?php
												// $array = $product->id;

											?>
                                            <h5 class="cart-product-title">{{$product->name}}</h5>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-quantity">

                                    <div class="quantity">
                                        x {{$product->qty}}
                                    </div>

                                </td>

                                <td class="product-subtotal">
                                    <h5 class="total amount">${{$product->price}}</h5>
                                </td>

                            </tr>
                        @endforeach
                        

						<tr class="cart_item total">

							<td class="product-thumbnail">


								<div class="cart-product-content">
									<h5 class="cart-product-title">Total:</h5>
								</div>


							</td>

							<td class="product-quantity">

							</td>

							<td class="product-subtotal">
								<h5 class="total amount">${{number_format(Cart::total())}}</h5>
							</td>
						</tr>

						</tbody>
					</table>

					<div class="cheque">

						<div class="logos">
							<a href="#" class="logos-item">
								<img src="{{asset('app/img/visa.png')}}" alt="Visa">
							</a>
							<a href="#" class="logos-item">
								<img src="{{asset('app/img/mastercard.png')}}" alt="MasterCard">
							</a>
							<a href="#" class="logos-item">
								<img src="{{asset('app/img/discover.png')}}" alt="DISCOVER">
							</a>
							<a href="#" class="logos-item">
								<img src="{{asset('app/img/amex.png')}}" alt="Amex">
							</a>
							
							<span style="float: right;">
								  <form method="post">
									@csrf
									<script src="https://checkout.flutterwave.com/v3.js"></script>
									<button class="btn btn-info" type="button" onClick="makePayment()">Buy Now</button>
								  </form>
								  
								  <script>
									function makePayment() {
									  FlutterwaveCheckout({
										public_key: "FLWPUBK_TEST-5518e6e65832c5ddf81a5a8121ac2c25-X",
										tx_ref: "hooli-tx-1920bbtyt",
										amount: {{Cart::total()}},
										currency: "NGN",
										payment_options: "card,mobilemoney,ussd",
										redirect_url: "{{route('cart.success')}}",
										meta: {
										  consumer_id: 23,
										  consumer_mac: "92a3-912ba-1192a",
										},
										customer: {
										  email: "{{auth()->user()->email}}",
										  phone_number: "{{auth()->user()->phone_number}}",
										  name: "{{auth()->user()->firstname}} {{auth()->user()->lastname}}",
										},
										callback: function (data) {
										//   console.log(data);
										},
										customizations: {
										  title: "Course Payment",
										  description: "Payment for items in cart",
										  logo: "https://assets.piedpiper.com/logo.png",
										},
									  });
									}
								  </script>
							</span>
						</div>
					</div>

				</form>
			</div>
		</div>

			</div>
		</div>
	</div>
</div>

@endsection