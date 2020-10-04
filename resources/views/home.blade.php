@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mt-2">
    <div class="row">
        <div class="col-md-8">
            {{-- Vue Home Copmpomenet --}}
            {{-- <home-component /> --}}
            <div class="card">
                <div class="card-header bg-red-300 text-white font-bold">List of Product</div>
                <div class="card-body">
                    <table class="table-auto items-center">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Price (RM)</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->price }}</td>
                                <td class="border px-4 py-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#cartModal{{$product->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @include('modal.info')
                                </td>
                            </tr>
                            @empty
                            <tr colspan="5">
                                <div class="alert-warning p-3">No record ...</div>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- <cart-component /> --}}
            <div class="card">
                <div class="card-header">
                    My Cart
                </div>
                <table class="table-auto items-center">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price(RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                        <tr>
                            <td class="border px-4 py-2" >{{$loop->index + 1}}</td>
                            <td class="border px-4 py-2">{{$cart->product->name}}</td>
                            <td class="border px-4 py-2">{{$cart->quantity}}</td>
                            <td class="border px-4 py-2">{{$cart->product->price}}</td>
                        </tr>
                        @empty
                            
                        @endforelse
                       
                    </tbody>
                </table>
                <div class="card-footer">
                    <button
                        class="bg-blue-400 hover:bg-red-300 p-2 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                        type="button"
                    >
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    const total = {{$cart->quantity}} * {{$cart->product->price}};
</script>