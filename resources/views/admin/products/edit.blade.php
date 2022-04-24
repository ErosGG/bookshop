@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Editar producte')

@section('content')

    <x-card.card>
        <x-card.body>

            <x-error.form-validation></x-error.form-validation>

            <x-form.form method="put" action="{{ route('admin.products.update', ['product' => $product]) }}" enctype="multipart/form-data">
                <x-form.input-text id="title" name="title" label="Títol" placeholder="Títol" value="{{ $product->title }}"></x-form.input-text>
                <x-form.input-text id="author" name="author" label="Autor" placeholder="Autor" value="{{ $product->author }}"></x-form.input-text>
                <x-form.input-number id="year" name="year" label="Any" placeholder="Any" value="{{ $product->year }}"></x-form.input-number>
                <x-form.input-text id="publisher" name="publisher" label="Editorial" placeholder="Editorial" value="{{ $product->publisher }}"></x-form.input-text>
                <x-form.input-text id="place" name="place" label="Lloc de publicació" placeholder="Lloc de publicació" value="{{ $product->place }}"></x-form.input-text>
                <x-form.input-text id="isbn" name="isbn" label="ISBN" placeholder="ISBN" value="{{ $product->isbn }}"></x-form.input-text>
                <x-form.input-text id="series" name="series" label="Col·lecció" placeholder="Col·lecció" value="{{ $product->series }}"></x-form.input-text>
                <x-form.input-number id="price" name="price" label="Preu" placeholder="Preu" value="{{ $product->price }}"></x-form.input-number>
                <x-form.input-number id="stock" name="stock" label="Estoc" placeholder="Estoc" value="{{ $product->stock }}"></x-form.input-number>
                <x-form.input-file id="image" name="image" label="Imatge" value="{{ $product->image }}"></x-form.input-file>
                <x-form.textarea id="description" name="description" label="Descripció" value="{{ $product->description }}"></x-form.textarea>
                <x-form.input-radio-inline id="highlighted" name="highlighted" label="Destacar" value="1" :checked="$product->highlighted"></x-form.input-radio-inline>
                <x-form.input-radio-inline id="no_highlighted" name="highlighted" label="No destacar" value="0" :checked="!$product->highlighted"></x-form.input-radio-inline>
            </x-form.form>

        </x-card.body>
    </x-card.card>

@endsection
