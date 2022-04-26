@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Detalls de la comanda')

@section('content')

<x-card.card>
    <x-card.body>

        <x-table.table>
            <x-table.head>
                <x-table.tr>
                    <x-table.th>Títol</x-table.th>
                    <x-table.th>Quantitat</x-table.th>
                    <x-table.th>Preu</x-table.th>
                    <x-table.th>Total</x-table.th>
                </x-table.tr>
            </x-table.head>
            <x-table.body>
                @foreach($products as $key => $product)
                    <x-table.tr>
                        <x-table.td align="start">{{ $product->title }}</x-table.td>
                        <x-table.td>{{ $product->pivot->quantity }}</x-table.td>
                        <x-table.td>{{ $product->pivot->price }}</x-table.td>
                        <x-table.td>{{ $product->pivot->quantity * $product->pivot->price }}</x-table.td>
                    </x-table.tr>
                @endforeach
                <tr class="fw-bold">
                    <td class="text-end" colspan="3">Total comanda</td>
                    <td class="text-center">{{ $total }}</td>
                </tr>
            </x-table.body>
        </x-table.table>

    </x-card.body>
</x-card.card>

@endsection
