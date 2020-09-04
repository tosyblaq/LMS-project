@extends('layouts.admin_inc');

@section('title')
    {{'Your Orders'}}
@endsection

@section('content')
<div class="container-fluid">
	<div class="row medium-padding120 bg-border-color">
		<div class="container">
			<div class="order">
                <h2 class="h1 order-title text-center mt-5">My Order</h2>
                @foreach ($orders as $order)
                    <div class="card mb-5 col-md-10 mx-auto">
                        <div class="card-header bg-info">
                            Purchased Date: {{$order->created_at->toFormattedDateString()}}
                        </div>
                        <div class="card-body">
                            <ul class="list list-group">
                                <li class="list-group-item font-weight-bold">
                                    Category: <a class="text-capitalize" href="{{route('academy.course', ['id' => $order->category_id, 'slug' => $order->category_name])}}">{{$order->category_name}}</a> 
                                    <span class="text-success float-right">Price: {{$order->price}}</span>
                                </li>
                                <li class="list-group-item font-weight-bold">
                                    Transaction Id: <span>{{$order->transaction_id}}</span>
                                    <span class="badge"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
</div>

@endsection
