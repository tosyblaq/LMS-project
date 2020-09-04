@extends('layouts.front')

@section('content')

        <div class="text-center py-5">
            <section class="section-pagetop bg-dark py-5">
                <div class="container clearfix">
                    <h2 class="title-page text-light">Order Completed</h2>
                </div>
            </section>
            <section class="section-content bg padding-y border-top py-5">
                <div class="container">
                    <div class="row">
                        <main class="col-sm-12">
                            <p class="alert alert-success">Your order placed successfully.</p>
                            <p><a href="{{route('cart.myOrder', ['id' => auth()->user()->id])}}" class="font-weight-bold btn btn-success">View Order</a></p>
                        <main>
                    </div>
                </div>
            </section>
        </div>
        
@endsection

