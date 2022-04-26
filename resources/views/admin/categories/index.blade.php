@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Categories')

@section('navbar-buttons')
    {{--    <x-form.form method="get" action="{{ route('admin.products.index') }}">--}}
    {{--        <x-form.input-text id="title_search" name="title" label="Cercador" placeholder="Cercador"></x-form.input-text>--}}
    {{--    </x-form.form>--}}
    <x-button.filter></x-button.filter>
    <x-button.add href="{{ route('admin.categories.create') }}"></x-button.add>
@endsection

@section('collapsed-filters')
    <div class="collapse" id="collapsed_filters">
        <div class="card card-body bg-dark">
            <x-form.form method="get" action="{{ route('admin.categories.index') }}">
                <x-form.input-text id="name_search" name="name" label="Cercador" placeholder="Cercador"></x-form.input-text>
            </x-form.form>
        </div>
    </div>
@endsection

@section('content')

    <x-card.card>
        <x-card.body>

            <x-table.table>
                <x-table.head>
                    <x-table.tr>
                        <x-table.th>Nom</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @foreach($categories as $category)
                        <x-table.tr>
                            <x-table.td align="start">{{ $category->name }}</x-table.td>
                            <x-table.td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <x-table.option.details href="{{ route('admin.categories.show', ['category' => $category]) }}"></x-table.option.details>
                                    <x-table.option.edit href="{{ route('admin.categories.edit', ['category' => $category]) }}"></x-table.option.edit>
                                    <x-table.option.delete href="{{ route('admin.categories.delete', ['category' => $category]) }}"></x-table.option.delete>
                                    {{--                                <x-table.option.restore href="{{ route('admin.products.restore', ['product' => $product]) }}"></x-table.option.restore>--}}
                                </div>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.body>
                <x-table.foot>
                    <x-table.tr>
                        <x-table.th>Nom</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.foot>
            </x-table.table>

            <x-table.paginator :models="$categories"></x-table.paginator>

        </x-card.body>
    </x-card.card>

@endsection

