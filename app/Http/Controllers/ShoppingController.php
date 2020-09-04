<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\AccountOrder;
use Cart;

class ShoppingController extends Controller
{
    //function to add course to cart
    public function add_to_cart(Request $request, $pid)
    {
        //dd(request()->all());
        $product = Category::findOrFail($pid);
       
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'weight' => 1,
        ]);

        Cart::associate($cart->rowId, 'App\Category');

        return redirect('cart');

    }

    //function to display cart
    public function cart()
    {
        return view('frontend/academic/cart');
    }

    //deleting cart item
    public function cart_delete($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }

    // Success payment
    public function success(Request $request, $id){
        //$email, $amount, $category
        //"status" => "successful"
        //dd(request()->all());
        /*
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->double('amount');
            $table->integer('transaction_id')->unsigned();
            $table->text('status');
            $table->timestamps();
        */
        
    }
}
