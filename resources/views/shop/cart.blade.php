@extends('layouts.shop.app')

@section('title', 'Cistella')

@section('content')

    <div class="container pt-5">
        <x-error.form-validation></x-error.form-validation>

        <x-form.form method="get" action="{{ route('shop.checkout') }}">
            @foreach($cartItems as $cartItem)
                    <x-form.input-number id=""
                                         name="products[{{ $cartItem->product->id }}]"
                                         label="{{ $cartItem->product->title }}"
                                         placeholder=""
                                         value="{{ $cartItem->quantity }}"
                                         min="1"
                    ></x-form.input-number>
            @endforeach
        </x-form.form>
    </div>

@endsection
