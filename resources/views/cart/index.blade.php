@extends('layouts.main')
@section('title','Корзина')
@section('content')
           <main>
                <div class="container">
                    <h1 class="text-center mt-5">Корзина</h1>

                    @if ($cart)
                    <a href="{{route('cart.clear')}}"><button class="btn btn-primary" data-delete_cart>Удалить все товары из корзины</button></a>
                    <div class="row mb-4">
                        <div class="col-12 col-lg-8">


                        @each ('cart.product.card',$cart,'product')

                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card p-3 mt-4">
                                <p class="fs-4">Общая сумма заказа:</p>
                                <p class="fw-bold" data-total_sum>@price($cartProps->total_sum) ₽</p>
                                <p class="fs-4">Общая сумма заказа c учётом бонусных баллов :</p>
                                <p class="fw-bold" data-sum_with_discount>@price($cartProps->sum_with_discount) ₽</p>
                               <p class="fs-4">Получившийся процент скидки на заказ: <span data-discount_percent>{{$cartProps->discount_percent}} %</span></p>
                                <button class="btn btn-primary">Заказать</button>
                            </div>
                        </div>

                    </div>
                    @else
                        <p class="fs-4 mt-20 text-center">Ваша корзина пуста</p>
                    @endif
                </div>
            </main>

@endsection
