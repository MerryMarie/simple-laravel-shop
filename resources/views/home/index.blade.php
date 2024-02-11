@extends('layouts.main')
@section('title','Главная')
@section('content')
<main>
    <div class="container">

        <div class="row">
            @each ('home.product.card',$products,'product')
            {{$products->appends(request()->query())->links('parts.pagination.index')}}
        </div>
    </div>
</main>
@endsection
