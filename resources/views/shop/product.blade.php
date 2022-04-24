@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="d-flex flex-wrap justify-content-evenly">

        <div class="mb-5 shadow rounded-3 border" style="width: 30%; min-width: 385px;">
            <a class="text-decoration-none text-dark" href="{{ route('shop.product.show', ['product' => $product->slug]) }}">
                <div class="d-flex flex-row">
                    <div>
                        <img class="rounded-start" src="{{ $product->image }}" alt="{{ $product->title }}" style="max-width: 225px; max-height: 225px;">
                    </div>
                    <div class="d-flex flex-column justify-content-between ms-2 me-2 my-1">
                        <span class="mb-1 fs-6 fw-bold fst-italic">{{ $product->title }}</span>
                        <span class="mb-1 fs-6">{{ $product->author }}</span>
                        <span class="mb-1 fs-6" style="display: inline-block; max-height: 75px; max-width: 100%; overflow-y: hidden; text-overflow: ellipsis;">{{ $product->description }}</span>
                        <small class="text-muted">{{ $product->price }} €</small>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection
