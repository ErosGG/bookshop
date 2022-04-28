@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="container pt-5">

        <div class="card card-body bg-dark">
            <x-form.form method="get" action="{{ route('shop.user.orders.search', ['user' => $user->uuid]) }}">
                <x-form.select id="status" name="status" label="Estat" placeholder="Estat" :options="$options"></x-form.select>
                <x-form.input-text id="id" name="id" label="ID" placeholder="ID"></x-form.input-text>
                <div class="text-light">
                    <label class="me-3" for="created_at">Data comanda</label><input type="date" id="created_at" name="created_at"><br>
                    <label class="me-3" for="updated_at">Data actualització</label><input type="date" id="updated_at" name="updated_at">
                </div>
            </x-form.form>
        </div>

        <x-table.table>
            <x-table.head>
                <x-table.tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Status</x-table.th>
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
                        <x-table.td>{{ $order->created_at }}</x-table.td>
                        <x-table.td>{{ $order->updated_at }}</x-table.td>
                        <x-table.td>
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <x-table.option.details href="{{ route('shop.user.order', ['user' => $user, 'order' => $order]) }}"></x-table.option.details>
                                {{--                                <x-table.option.restore href="{{ route('admin.products.restore', ['product' => $product]) }}"></x-table.option.restore>--}}
                            </div>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.body>
        </x-table.table>

        <x-table.paginator :models="$orders"></x-table.paginator>

    </div>

@endsection
