<article class="card mt-4 overflow-hidden">
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="img-wrap">
                <img class="w-100" src="{{asset('images/'.$product->item->image)}}" alt="Изображение товара">
            </div>
        </div>
        <div class="col-12 col-sm-8 d-flex align-items-center">
            <div class="p-3">
                <h3 class="fs-6 mb-2">
                    {{ $product->item->name}}
                </h3>

                <div class="d-flex align-items-center gap-3 " data-c_inc_n_dec="{{$product->item->id}}">
                    <button class="btn  btn-outline-primary " data-c_decrement_btn data-product_id="{{$product->item->id}}" >-</button>
                    <span data-c_product_quantity data-product_id="{{$product->item->id}}">{{$product->quantity}}</span>
                    <button class="btn  btn-outline-primary  " data-c_increment_btn   data-product_id="{{$product->item->id}}" >+</button>
                </div>
                <p class="fw-bold fs-6 m-0">
                    цена без скидки - @price($product->quantity * $product->item->price) ₽ / шт.
                </p>



            </div>
        </div>
    </div>
</article>
