@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('section', 'Orders')

@section('navbar-buttons')
    {{--    <x-form.form method="get" action="{{ route('admin.products.index') }}">--}}
    {{--        <x-form.input-text id="title_search" name="title" label="Cercador" placeholder="Cercador"></x-form.input-text>--}}
    {{--    </x-form.form>--}}
    <x-button.filter></x-button.filter>
{{--    <x-button.add href="{{ route('admin.orders.create') }}"></x-button.add>--}}
@endsection

@section('collapsed-filters')
    <div class="collapse" id="collapsed_filters">
        <div class="card card-body bg-dark">
            <x-form.form method="get" action="{{ route('admin.orders.index') }}">
                <x-form.select id="status" name="status" label="Estat" placeholder="Estat" :options="$options"></x-form.select>
                <x-form.input-text id="id" name="id" label="ID" placeholder="ID"></x-form.input-text>
                <x-form.input-text id="email" name="email" label="Correu electrònic" placeholder="Correu electrònic"></x-form.input-text>
                <div class="text-light">
                    <label class="me-3" for="created_at">Data comanda</label><input type="date" id="created_at" name="created_at"><br>
                    <label class="me-3" for="updated_at">Data actualització</label><input type="date" id="updated_at" name="updated_at">
                </div>
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
                        <x-table.th>ID</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Client</x-table.th>
                        <x-table.th>Data comanda</x-table.th>
                        <x-table.th>Data actualització</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.head>
                <x-table.body>
                    @foreach($orders as $order)
                        <x-table.tr>
                            <x-table.td>{{ $order->id }}</x-table.td>
                            <x-table.td>
                                @if($order->status === 'pending')
                                    {{ 'Pendent' }}
                                @elseif($order->status === 'processing')
                                    {{ 'En procés' }}
                                @elseif($order->status === 'completed')
                                    {{ 'Completada' }}
                                @elseif($order->status === 'shipped')
                                    {{ 'Enviada' }}
                                @elseif($order->status === 'cancelled')
                                    {{ 'Cancel·lada' }}
                                @endif
                            </x-table.td>
                            <x-table.td>{{ $order->user->email }}</x-table.td>
                            <x-table.td>{{ $order->created_at }}</x-table.td>
                            <x-table.td>{{ $order->updated_at }}</x-table.td>
                            <x-table.td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <x-table.option.details href="{{ route('admin.orders.show', ['order' => $order]) }}"></x-table.option.details>
                                    <x-table.option.edit href="{{ route('admin.orders.edit', ['order' => $order]) }}"></x-table.option.edit>
                                    <x-table.option.delete href="{{ route('admin.orders.delete', ['order' => $order]) }}"></x-table.option.delete>
                                    {{--                                <x-table.option.restore href="{{ route('admin.products.restore', ['product' => $product]) }}"></x-table.option.restore>--}}
                                </div>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.body>
                <x-table.foot>
                    <x-table.tr>
                        <x-table.th>ID</x-table.th>
                        <x-table.th>Status</x-table.th>
                        <x-table.th>Client</x-table.th>
                        <x-table.th>Data comanda</x-table.th>
                        <x-table.th>Data actualització</x-table.th>
                        <x-table.th>Opcions</x-table.th>
                    </x-table.tr>
                </x-table.foot>
            </x-table.table>

            <x-table.paginator :models="$orders"></x-table.paginator>

        </x-card.body>
    </x-card.card>

@endsection

