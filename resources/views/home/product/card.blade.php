<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
    <article class="card mt-5 overflow-hidden @if (!$product->bonus) border-primary @endif">
        <div class="img-wrap">
            <img class="w-100" src="{{asset('images/'.$product->image)}}" alt="Изображение товара">
        </div>
        <div class="p-3">
            <h3 class="fs-6 mb-3">
                {{$product->name}}
            </h3>
            <div class="d-flex align-items-center justify-content-between">
                <p class="fw-bold fs-5 m-0">

                   @price($product->price) ₽
                </p>
                @guest
                    <button class="btn btn-primary " onclick="document.querySelector('[data-login_btn]').click()">
                        В корзину
                    </button>
                @else

                    @incart($product->id)
                        <div class="d-flex align-items-center gap-3 " data-inc_n_dec="{{$product->id}}">
                            <button class="btn  btn-outline-primary " data-decrement_btn data-product_id="{{$product->id}}" >-</button>
                            <span data-product_quantity data-product_id="{{$product->id}}">{{$product->cartQuantity()}}</span>
                            <button class="btn  btn-outline-primary  " data-increment_btn   data-product_id="{{$product->id}}" >+</button>
                        </div>
                        <button class="btn  btn-primary d-none" data-add_to_cart_btn data-product_id="{{$product->id}}" >
                            В корзину
                        </button>
                    @else

                        <div class="d-flex align-items-center gap-3 d-none" data-inc_n_dec="{{$product->id}}">
                            <button class="btn  btn-outline-primary " data-decrement_btn data-product_id="{{$product->id}}" >-</button>
                            <span data-product_quantity data-product_id="{{$product->id}}">{{$product->cartQuantity()}}</span>
                            <button class="btn  btn-outline-primary  " data-increment_btn   data-product_id="{{$product->id}}" >+</button>
                        </div>
                        <button class="btn  btn-primary " data-add_to_cart_btn data-product_id="{{$product->id}}" >
                            В корзину
                        </button>
                    @endincart
                @endguest





            </div>
        </div>
    </article>
</div>
