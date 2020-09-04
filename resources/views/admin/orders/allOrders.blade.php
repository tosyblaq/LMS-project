@extends('layouts.admin_inc')

@section('title')
    {{'Students Orders'}}
@endsection

@section('content')
<div class="container-fluid">
	<div class="row medium-padding120 bg-border-color">
		<div class="container">
			<div class="order">
        <div class="card mt-5">
            <div class="card-head bg-info">
              <h3 class="card-title pl-3 order-title text-center pt-3">Students Orders</h3>
              <p class="card-course"></p>
            </div>
            {{-- <h2 class="h1 order-title text-center mt-5 bg-info">Students Orders</h2> --}}
            <div class="card-body">
              <table id="course" class="table text-capitalize table-hover table-striped table-bordered font-weight-bold text-center">
                <thead class="bg-info">
                  <tr>
                    <th style="width:20%;">Name</th>
                    <th style="width:9%;">Image</th>
                    <th style="width:30%;">Courses Purchased</th>
                    <th style="width:9%;">Price</th>
                    <th style="width:17%;">Purchased Date</th>
                    <th style="width:13%;">Transaction Id</th>
                  </tr>
                </thead>
                @foreach ($orders as $order)
                <tr>
                  <td>{{e($order->user->firstname)}} {{e($order->user->lastname)}}</td>
                  <td class="text-lowercase"><img src="{{asset('/storage/'.$order->user->image)}}" alt="{{e($order->user->firstname)}} {{e($order->user->lastname)}}" style="height:80px;"></td>
                  <td class="text-lowercase">{{e($order->category_name)}}</td>
                  <td class="text-lowercase">{{e($order->price)}}</td>
                  <td class="text-lowercase">{{e($order->created_at->toFormattedDateString())}}</td>
                  <td class="text-lowercase">{{e($order->transaction_id)}}</td>
                </tr>
              @endforeach
            </table>
            </div>
        </div>
			</div>
		</div>
	</div>
</div>


@endsection
