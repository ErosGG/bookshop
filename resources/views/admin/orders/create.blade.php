@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'crear categoria')

@section('content')

<x-card.card>
    <x-card.body>

        <x-error.form-validation></x-error.form-validation>

        <x-form.form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            <x-form.input-text id="name" name="name" label="Nom" placeholder="Nom"></x-form.input-text>
            <x-form.input-file id="image" name="image" label="Imatge"></x-form.input-file>
            <x-form.textarea id="description" name="description" label="Descripció"></x-form.textarea>
            <x-form.input-radio-inline id="highlighted" name="highlighted" label="Destacar" value="1"></x-form.input-radio-inline>
            <x-form.input-radio-inline id="no_highlighted" name="highlighted" label="No destacar" value="0" :checked="true"></x-form.input-radio-inline>
        </x-form.form>

    </x-card.body>
</x-card.card>

@endsection
