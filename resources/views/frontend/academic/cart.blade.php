@extends('layouts.front')

@section('content')
<div class="container-fluid">
    <div class="row bg-border-color medium-padding120">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="cart">

                        <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary"> {{Cart::content()->count()}}</span></h1>

                    </div>

                    <form action="#" method="post" class="cart-main">

                        <table class="shop_table cart">
                            <thead class="bg-info">
                                {{-- cart-product-wrap-title-main  --}}
                                <tr class="font-weight-bold">
                                    <th class="product-remove py-4">&nbsp;</th>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity"></th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach (Cart::content() as $product)
                            <tr class="cart_item">

                                <td class="product-remove">
                                    <a href="{{route('cart.delete', ['id' => $product->rowId])}}" class="product-del remove" title="Remove this item">
                                        <i class="seoicon-delete-bold"></i>
                                    </a>
                                </td>

                                <td class="product-thumbnail">

                                    <div class="cart-product__item" style="width: 60%;">
                                        <a href="#">
                                            {{-- Fix this --}}
                                            {{-- <img src="{{asset('/storage/'.$product->model->image)}}" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"> --}}
                                        </a>
                                        <div class="cart-product-content">
                                            <h5 class="cart-product-title pl-3 text-capitalize">{{$product->name}}</h5>
                                        </div>
                                    </div>
                                </td>
                                {{-- {{Cart::content()}} --}}
                                <td class="product-price">
                                    <h5 class="price amount">${{number_format($product->price)}}</h5>
                                </td>

                                <td class="product-quantity" style="width: 10%;">

                                    <div class="quantity">
                                        <input title="Qty" value="{{$product->qty}}" class="email input-text qty text" type="hidden" readonly>
                                    </div>

                                </td>

                                <td class="product-subtotal">
                                    <h5 class="total amount">{{number_format($product->total())}}</h5>
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </form>

                    <div class="cart-total">
                        <h3 class="cart-total-title">Cart Totals</h3>
                        <h5 class="cart-total-total">Total: <span class="price">{{Cart::total()}}</span></h5>
                       @if(auth()->user())
                            @if(Cart::content()->count() > 0)
                            <a href="{{route('cart.checkout')}}" class="btn gradient-button gradient-button-4">
                                <span class="text">Checkout</span>
                                <span class="semicircle"></span>
                            </a>
                            @endif
                        @else
                            <a href="{{route('login')}}" class="btn gradient-button gradient-button-4">
                                <span class="text text-light text-capitalize">Sign In to Checkout</span>
                            </a>
                       @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection