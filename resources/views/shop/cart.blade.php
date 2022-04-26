@extends('layouts.shop.app')

@section('title', 'Cistella')

@section('content')

    <div class="container pt-5">

        <x-error.form-validation></x-error.form-validation>

        @if($cartItems->isNotEmpty())
            <x-form.form method="get" action="{{ route('shop.checkout') }}">
                @foreach($cartItems as $cartItem)
                    <div class="container">
                        <div class="row d-flex justify-items-center">
                            <div class="col">
                                <x-form.input-number id=""
                                                     name="products[{{ $cartItem->product->id }}]"
                                                     label="{{ $cartItem->product->title }}"
                                                     placeholder=""
                                                     value="{{ $cartItem->quantity }}"
                                                     min="1"
                                ></x-form.input-number>
                            </div>
                            <div class="col-md-auto">
                                <a href="{{ route('shop.cart.remove', ['product' => $cartItem->product]) }}">
                                    <i class="fs-2 bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-form.form>
        @else
            Encara no heu afegit cap producte a la cistella ;)
        @endif
    </div>

@endsection
