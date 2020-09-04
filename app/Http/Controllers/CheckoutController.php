<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountOrder;
use Cart;
use Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //function to display items to be paid for
    public function index()
    {
        return view('frontend/academic/checkout');
    }

    public function pay()
    {
       dd(request()->all());
    }

    public function success(Request $request)
    {
        $items = Cart::content();
        if($request->status === 'successful')
        {
            foreach($items as $item){
                $data = auth()->user()->orders()->create([
                    'cart_rowId' => $item->rowId,
                    'category_id' => $item->id,
                    'category_name' => $item->name,
                    'price' => $item->price,
                    'transaction_id' => $request->transaction_id,
                    'status' => $request->status
                ]);
            }

            Cart::destroy();
            // dd($data);
            return view('frontend/academic/success');
        }

    }

    public function myOrder($id)
    {
        if(Auth::user()->id == $id)
        {
            $orders = auth()->user()->orders;
            $orders->transform(function($order, $key){
            $order->cart = $order->cart;
            return $order;
            });
        
            //dd($orders);
            return view('frontend/academic/myOrder')
            ->with('orders', $orders);
            }
        else
        {
            return redirect()->back();
        }
    }

    public function allOrders()
    {
        $orders = AccountOrder::all();
        $orders->transform(function($order, $key){
            // $order->cart = unserialize($order->cart);
            $order->cart = $order->cart;
            return $order;
        });

        return view('admin/orders/allOrders')
        ->with('orders', $orders);
    }
}
