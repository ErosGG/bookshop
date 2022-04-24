@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="d-flex flex-wrap justify-content-evenly py-5">

        @foreach($highlightedProducts as $product)
{{--            <div class="col-md-4">--}}
{{--                <div class="card mb-4 shadow-sm">--}}
{{--                    <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->title }}">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">{{ $product->title }}</p>--}}
{{--                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                            <div class="btn-group">--}}
{{--                                <a href="{{ route('shop.product.show', $product->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>--}}
{{--                            </div>--}}
{{--                            <small class="text-muted">{{ $product->price }} €</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card mb-4 shadow-sm">--}}
{{--                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->title }}">--}}
{{--                <div class="card-body">--}}
{{--                    <p class="card-text">{{ $product->title }}</p>--}}
{{--                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('shop.product.show', $product->slug) }}">View</a>--}}
{{--                        </div>--}}
{{--                        <small class="text-muted">{{ $product->price }} €</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card" style="width: 18rem;">--}}
{{--                <div class="card-body">--}}
{{--                    <img src="{{ $product->image }}" alt="{{ $product->title }}">--}}
{{--                    <h5 class="card-title">{{ $product->title }}</h5>--}}
{{--                    <p class="card-text">{{ $product->description }}</p>--}}
{{--                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="mb-5 shadow-sm rounded-3 border" style="width: 30%; min-width: 385px; height: 225px;">
                <a class="text-decoration-none text-dark" href="{{ route('shop.product.show', ['product' => $product->slug]) }}">
                    <div class="d-flex flex-row h-100">
                        <div>
                            <img class="rounded-start" src="{{ $product->image }}" alt="{{ $product->title }}" style="width: 150px; height: 225px; object-fit: cover;">
                        </div>
                        <div class="d-flex flex-column justify-content-between ms-2 me-2 mb-2">
                            <div class="d-block mb-1">
                                <div class="fs-6 fw-bold fst-italic" style="display: inline-block; max-height: 50px; overflow-y: hidden; text-overflow: ellipsis;">{{ $product->title }}</div>
                                <div class="fs-6">{{ $product->author }}</div>
                            </div>
                            <div class="mb-1" style="display: inline-block; max-height: 75px; max-width: 100%; overflow-y: hidden; text-overflow: ellipsis; font-size: 12px">{{ $product->description }}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="post" action="{{ route('shop.cart.add') }}">
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

@endsection
