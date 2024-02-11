<?php

namespace App\Http\Controllers;
use App\Services\CartService;
use Auth;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    protected $product=null;
    public $service;

    public function __construct(CartService $service,Product $product){
        $this->product=$product;
        $this->service = $service;
    }

    public function index(){
        $already_cart =Cart::where('user_id', auth()->user()->id)->get();
        if($already_cart->isNotEmpty()) {
        foreach ($already_cart as $cartItem){
            $cartItem['item'] = Product::find($cartItem->product_id);

        }
            return view('cart.index')
                ->with('cart',$already_cart)
                ->with('cartProps', (object)[
                    "total_sum"=>Cart::cartTotalSum(),
                    "sum_with_discount"=>Cart::cartSumWithDiscount(),
                    "discount_percent"=>Cart::discountPercent()
                ]);
        }
        else{
            return view('cart.index')->with('cart',false);
        }
    }
    public function addToCart(Product $product){
        /*$product = Product::find($id);

        if (empty($product)) {
            return back();
        }*/
        $this->service->add($product);
        return new CartResource($product);
        //return back();
    }

    public function removeFromCart(Product $product){

        /*$product = Product::find($id);

        if (empty($product)) {
            return back();
        }*/
        $this->service->remove($product);


        //return back();
        return new CartResource($product);
    }


    public function cartClear(){
        $cart = Cart::where('user_id',auth()->user()->id)->delete();
        return back();
    }



    public function cartO(Product $product){
        dd($product);

    }



}
