@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="container pt-5">

        <x-form.form action="">
            <x-form.input-text id="user" name="user" label="Usuari" value="{{ $user->name }}" placeholder="Usuari"></x-form.input-text>
            <x-form.input-text id="email" name="email" label="Correu electrònic" value="{{ $user->email }}" placeholder="Correu electrònic"></x-form.input-text>
        </x-form.form>

    </div>

@endsection
