@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Afegir producte')

@section('content')

<x-card.card>
    <x-card.body>

        <x-error.form-validation></x-error.form-validation>

        <x-form.form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            <x-form.input-text id="title" name="title" label="Títol" placeholder="Títol"></x-form.input-text>
            <x-form.input-text id="author" name="author" label="Autor" placeholder="Autor"></x-form.input-text>
            <x-form.input-number id="year" name="year" label="Any" placeholder="Any"></x-form.input-number>
            <x-form.input-text id="publisher" name="publisher" label="Editorial" placeholder="Editorial"></x-form.input-text>
            <x-form.input-text id="place" name="place" label="Lloc de publicació" placeholder="Lloc de publicació"></x-form.input-text>
            <x-form.input-text id="isbn" name="isbn" label="ISBN" placeholder="ISBN"></x-form.input-text>
            <x-form.input-text id="series" name="series" label="Col·lecció" placeholder="Col·lecció"></x-form.input-text>
            <x-form.input-number id="price" name="price" label="Preu" placeholder="Preu"></x-form.input-number>
            <x-form.input-number id="stock" name="stock" label="Estoc" placeholder="Estoc"></x-form.input-number>
            <x-form.input-switch id="highlighted" name="highlighted" label="Destacat"></x-form.input-switch>
        </x-form.form>

    </x-card.body>
</x-card.card>

@endsection
