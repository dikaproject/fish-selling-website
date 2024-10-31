@extends('layouts.app')

@section('content')
<h1>Checkout</h1>

<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <h2>Alamat Pengiriman</h2>
    @if($shippingAddresses->isNotEmpty())
        <select name="address_id">
            @foreach($shippingAddresses as $address)
                <option value="{{ $address->id }}">{{ $address->recipient_name }} - {{ $address->address_line1 }}</option>
            @endforeach
        </select>
    @else
        <!-- Form untuk menambahkan alamat baru -->
        <input type="text" name="recipient_name" placeholder="Nama Penerima" required>
        <input type="text" name="phone" placeholder="Nomor Telepon" required>
        <input type="text" name="address_line1" placeholder="Alamat" required>
        <input type="text" name="city" placeholder="Kota" required>
        <input type="text" name="state" placeholder="Provinsi" required>
        <input type="text" name="postal_code" placeholder="Kode Pos" required>
        <input type="text" name="country" placeholder="Negara" value="Indonesia" required>
    @endif

    <h2>Ringkasan Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->product->price, 2) }}</td>
                <td>{{ $item->quantity }} {{ $item->product->unit }}</td>
                <td>{{ number_format($item->product->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit">Bayar Sekarang</button>
</form>
@endsection
