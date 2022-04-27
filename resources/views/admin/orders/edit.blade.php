@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Editar comanda')

@section('content')

    <x-card.card>
        <x-card.body>

            <x-error.form-validation></x-error.form-validation>

            <x-form.form method="put" action="{{ route('admin.orders.update', ['order' => $order]) }}" enctype="multipart/form-data">
                <x-form.select id="status" name="status" label="Estat" placeholder="Estat" :options="$options" selected="{{ $order->status }}"></x-form.select>
            </x-form.form>

        </x-card.body>
    </x-card.card>

@endsection
