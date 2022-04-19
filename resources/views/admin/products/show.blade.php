@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Detalls del producte')

@section('content')

<x-card.card>
    <x-card.body>
        <!-- Product details -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->title }}" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Descripció</label>
                    <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preu</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" disabled>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" disabled>
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $product->category?->title }}" disabled>
                </div>
                <div class="form-group">
                    <label for="image">Imatge</label>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-thumbnail">
                </div>
            </div>

    </x-card.body>
</x-card.card>

@endsection
