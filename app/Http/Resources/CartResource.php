<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'product_id' =>$this->id,
            'cart_props' => [
                "total_sum"=>number_format(Cart::cartTotalSum(), 0, '.', ' '),
                "sum_with_discount"=>number_format(Cart::cartSumWithDiscount(), 0, '.', ' '),
                "discount_percent"=>number_format(Cart::discountPercent()),
                'cart_count'=>Cart::cartCount()
            ],
            'quantity' => $this->cartQuantity(),
            'status'=>'success'
        ];

    }
}
