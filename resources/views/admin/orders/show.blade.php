@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Detalls de la comanda')

@section('content')

<x-card.card>
    <x-card.body>

{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group mb-5">--}}
{{--                    <label for="name">Nom</label>--}}
{{--                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" disabled>--}}
{{--                </div>--}}
{{--                <div class="form-group mb-5">--}}
{{--                    <label for="description">Descripció</label>--}}
{{--                    <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $category->description }}</textarea>--}}
{{--                </div>--}}
{{--                <div class="form-check mb-5">--}}
{{--                    <input type="checkbox" class="form-check-input" id="highlighted" name="highlighted" disabled @if($category->highlighted) checked @endif>--}}
{{--                    <label for="highlighted">Destacada</label>--}}
{{--                </div>--}}
{{--            </div>--}}

        @foreach($products as $key => $value)
            {{ $value->pivot->quantity }}<br>
        @endforeach

    </x-card.body>
</x-card.card>

@endsection
