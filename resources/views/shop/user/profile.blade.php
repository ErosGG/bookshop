@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="container pt-5">

        <x-error.form-validation></x-error.form-validation>

        <x-form.form method="post" action="{{ route('shop.user.profile.update', ['user' => $user->uuid]) }}">
            <x-form.input-text id="name" name="name" label="Nom" value="{{ $user->name }}" placeholder="Nom"></x-form.input-text>
            <x-form.input-text id="email" name="email" label="Correu electrònic" value="{{ $user->email }}" placeholder="Correu electrònic"></x-form.input-text>
            <x-form.input-text id="email_confirmation" name="email_confirmation" label="Confirmeu el correu electrònic" placeholder="Confirmeu el correu electrònic"></x-form.input-text>
            <x-form.input-text id="actual_password" name="actual_password" label="Contrasenya actual" placeholder="Contrasenya actual"></x-form.input-text>
            <x-form.input-text id="new_password" name="new_password" label="Contrasenya nova" placeholder="Contrasenya nova"></x-form.input-text>
            <x-form.input-text id="new_password_confirmation" name="new_password_confirmation" label="Confirmeu la contrasenya nova" placeholder="Confirmeu la contrasenya nova"></x-form.input-text>
        </x-form.form>

    </div>

@endsection
