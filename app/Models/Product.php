<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    public function cart(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }

    public static function isInCart($id):int
    {

        $cart =Cart::where('user_id', auth()->user()->id)->where('product_id',$id )->first();
        if($cart){
            return true;
        }else{
            return false;
        }

    }
    public function cartQuantity():int
    {

        $cart =Cart::where('user_id', auth()->user()->id)->where('product_id',$this->id )->first();
        if($cart){
            return $cart->quantity;
        }else{
            return 0;
        }

    }


}
