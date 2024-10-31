@extends('layouts.app')

@section('content')
<h1>Keranjang Belanja</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

@if($cartItems->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->product->price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                        {{ $item->product->unit }}
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('checkout.view') }}">Lanjut ke Pembayaran</a>
@else
    <p>Keranjang Anda kosong.</p>
@endif
@endsection
