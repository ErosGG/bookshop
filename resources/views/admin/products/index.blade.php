@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Productes')

@section('content')
{{--    <div class="card w-100 text-white bg-dark">--}}
    <div class="card max-w-100 m-4 bg-dark text-white">
        <div class="card-body p-4">

            <!-- Create Product button -->
            <a class="btn btn-primary"
               href="{{ route('admin.products.create') }}"
            ><i class="bi bi-plus-circle"></i> Nou</a>

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>Títol</x-table.th>
                        <x-table.th>Autor</x-table.th>
                        <x-table.th>Any</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @foreach($products as $product)
                        <x-table.tr>
                            <x-table.td>{{ $product->title }}</x-table.td>
                            <x-table.td>{{ $product->author }}</x-table.td>
                            <x-table.td>{{ $product->year }}</x-table.td>
                            <x-table.td>
                                <x-table.option.details href="{{ route('admin.products.show', ['product' => $product]) }}"></x-table.option.details>
                                <x-table.option.edit href="{{ route('admin.products.edit', ['product' => $product]) }}"></x-table.option.edit>
                                <x-table.option.delete href="{{ route('admin.products.delete', ['product' => $product]) }}"></x-table.option.delete>
                                <x-table.option.restore href="{{ route('admin.products.restore', ['product' => $product]) }}"></x-table.option.restore>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.body>
                <x-table.foot>
                    <x-table.tr>
                        <x-table.th>Títol</x-table.th>
                        <x-table.th>Autor</x-table.th>
                        <x-table.th>Any</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.foot>
            </x-table.table>

            {{ $products->links() }}
        </div>
    </div>
@endsection
