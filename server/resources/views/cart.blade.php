@extends('layout')

@section('center')
<div class="container text-center mt-5">
    @foreach($products->chunk(4) as $chunk)
        <div class="row align-items-center justify-content-start">
            @foreach($chunk as $product)
                <div class="col-3">
                    <div class="card mb-5" style="height: 25rem; width: 15rem;">
                        <img style="height: 15rem; width: 15rem;" class="img-thumbnail card-img-top" src="{{ asset('storage/products/' . $product->image) }}" alt="">
                        <div class="card-body">
                            <p class="card-text">{{ $product->name }}</p>
                            <h3 class="card-title">{{ $product->price }} ₸</h3>
                            <div class="d-grid gap-2">
                                <a href="{{ route('cart.add', ['product_id' => $product->getKey()]) }}" class="btn btn-success">Купить</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection