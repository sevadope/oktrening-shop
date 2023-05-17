@extends('layout')

@section('center')
<a href="/" class="btn btn-lg btn-secondary">Назад</a>
<div class="container text-center mt-5">
    @foreach($items as $item)
        <div class="row align-items-center justify-content-between mb-3">
            <div class="col-2">
                <img style="height: 10rem; width: 10rem;" class="img-thumbnail" src="{{ asset('storage/products/' . $item->product->image) }}" alt="">
            </div>
            <div class="col-3">
                {{ $item->product->name }}
            </div>
            <div class="col-1">
                <h3>{{ $item->count }}</h3>
            </div>
            <div class="col-1">
                <div class="btn-group">
                    <a href="{{ route('cart.add', ['id' => $item->product->getKey()]) }}" class="btn btn-outline-primary">+</a>
                    <a href="{{ route('cart.remove', ['id' => $item->product->getKey()]) }}" class="btn btn-outline-danger">-</a>
                </div>
            </div>
            <div class="col-5">
                <h3 class="">{{ $item->product->price * $item->count }} ₸</h3>
            </div>
        </div>
    @endforeach
    <div class="row mt-5">
        @if($items->isNotEmpty())
        <div class="col-4">
            <h2>Итого: {{ $items->sum(fn($p) => $p->product->price * $p->count) }} ₸</h2>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="d-grid gap-2">
                <a href="{{ route('cart.buy') }}" class="btn btn-lg btn-success">Оплатить</a>
            </div>
        </div>
        @else
        <div class="col-12">
            <h2>Ваша корзина пуста</h2>
        </div>
        @endif
    </div>
</div>
@endsection