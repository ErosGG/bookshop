@extends('layouts.shop.app')

@section('title', 'Cistella')

@section('content')

    <div class="container pt-5">

        <x-error.form-validation></x-error.form-validation>

        @if($cartItems->isNotEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-9"><h3>Cistella</h3></div>
                    <div class="col-1 center-text"><h4>Total</h4></div>
                    <div class="col-1"><h4><span id="cart_total" class="float-right"></span>€</h4></div>
                    <div class="col-1"></div>
                </div>
            </div>
            <x-form.form method="get" action="{{ route('shop.checkout') }}">
                @foreach($cartItems as $cartItem)
                    <div class="container">
                        <div class="row d-flex justify-items-center">
                            <div class="col">
                                <x-form.input-number id="quantity_{{ $cartItem->product->id }}"
                                                     name="products[{{ $cartItem->product->id }}]"
                                                     label="{{ $cartItem->product->title }}"
                                                     placeholder=""
                                                     value="{{ $cartItem->quantity }}"
                                                     min="1"
                                ></x-form.input-number>
                            </div>
                            <div class="col-md-1 pt-3">
                                {{ $cartItem->product->price }}€
                            </div>
                            <div class="col-md-1 pt-3">
                                <span id="total_{{ $cartItem->product->id }}"></span>€
                            </div>
                            <div class="col-md-1 pt-2">
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

<script>
    window.onload = function () {
        @foreach($cartItems as $cartItem)
            document.getElementById('total_{{ $cartItem->product->id }}').innerHTML = {{ $cartItem->product->price * $cartItem->quantity }};
        @endforeach

        let totals = document.querySelectorAll('span[id^=total_]');
        let total = 0;
        for (let i = 0; i < totals.length; i++) {
            total += parseFloat(totals[i].innerHTML);
        }
        document.getElementById('cart_total').innerHTML = round(total, 2);

        @foreach($cartItems as $cartItem)
            document.getElementById('quantity_{{ $cartItem->product->id }}').addEventListener('change', function () {
                document.getElementById('total_{{ $cartItem->product->id }}').innerHTML = round({{ $cartItem->product->price }} * this.value, 2);
                let total = 0;
                for (let i = 0; i < totals.length; i++) {
                    total += parseFloat(totals[i].innerHTML);
                }
                document.getElementById('cart_total').innerHTML = round(total, 2);
            });
        @endforeach


        function round(value, decimals) {
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }
    };
</script>
