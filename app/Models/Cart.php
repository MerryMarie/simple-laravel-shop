<?php

namespace App\Models;
use App\Models\Product;
use Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','quantity'];

    public static function cartTotalSum():int
    {
        $cart = Cart::where('user_id',auth()->user()->id)->get();
        $totalSum=0;
        foreach ($cart as $cartItem){
            $product=Product::find($cartItem->product_id);
            $totalSum+= $product->price * $cartItem->quantity;
        }
        return $totalSum;

    }
    public static function cartCount():int
    {
        $count=0;
        if(auth()->user()) {
            $count = Cart::where('user_id', auth()->user()->id)->count();
        }
        return $count;

    }
    public static function cartSumWithDiscount():int
    {

        return max(Cart::cartTotalSum() - Auth::user()->bonus_balls, 0);

    }
    public static function discountPercent():int
    {
        $cartTotalSum = Cart::cartTotalSum();
        if($cartTotalSum > 0) {
            return ceil(100 - Cart::cartSumWithDiscount() / (Cart::cartTotalSum() / 100));
        }else{
            return 0;
        }

    }




}
