<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Cart;
use Auth;
class CartService
{
    public function add(Product $product){


        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

        if($already_cart) {

            $already_cart->quantity = $already_cart->quantity + 1;

            if ( $product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $already_cart->save();

        }else{

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->quantity = 1;

            if ( $product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $cart->save();
        }
    }

    public function remove(Product $product)
    {
        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

        if($already_cart) {

            $already_cart->quantity = $already_cart->quantity - 1;
            if($already_cart->quantity<=0){
                $this->cartProductDelete($already_cart->id);
            }

            $already_cart->save();

        }else{

            return back()->with('error','There is no such product in the cart!');

        }
    }

    public function cartProductDelete($id){
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return true;
        }
        return false;
    }



}
