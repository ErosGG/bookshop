@extends('layouts.shop.app')

@section('title', 'Home')

@section('content')

    <div class="container pt-5">

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
