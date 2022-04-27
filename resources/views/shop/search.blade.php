@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="d-flex flex-wrap justify-content-evenly py-5">

        @foreach($products as $product)

            <div class="mb-5 shadow-sm rounded-3 border" style="width: 30%; min-width: 385px; height: 225px;">
                <a class="text-decoration-none text-dark" href="{{ route('shop.product.show', ['product' => $product->slug]) }}">
                    <div class="d-flex flex-row h-100">
                        <div class="h-100">
                            <img class="rounded-start h-100" src="{{ $product->image }}" alt="{{ $product->title }}" style="width: 150px; object-fit: cover;">
                        </div>
                        <div class="d-flex flex-column justify-content-between ms-2 me-2 mb-2">
                            <div class="d-block mb-1">
                                <div class="fs-6 fw-bold fst-italic" style="display: inline-block; max-height: 50px; overflow-y: hidden; text-overflow: ellipsis;">{{ $product->title }}</div>
                                <div class="fs-6">{{ $product->author }}</div>
                            </div>
                            <div class="mb-1" style="display: inline-block; max-height: 75px; max-width: 100%; overflow-y: hidden; text-overflow: ellipsis; font-size: 12px">{{ $product->description }}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="post" action="{{ route('shop.cart.add', ['product' => $product]) }}">
                                    @csrf
                                    <input class="btn btn-sm btn-outline-dark rounded" type="submit" value="Afegir a la cistella">
                                </form>
                                <div class="text-muted">{{ $product->price }} €</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach

    </div>

    {{ $products->links() }}

@endsection
