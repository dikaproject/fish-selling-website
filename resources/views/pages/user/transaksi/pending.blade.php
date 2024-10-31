@extends('layouts.app')

@section('title', 'Pembayaran Pending')

@section('content')
<div class="container mt-5">
    <div class="alert alert-warning text-center">
        <h1>Pembayaran Pending</h1>
        <p>Pembayaran Anda sedang diproses. Silakan tunggu beberapa saat atau cek kembali status pembayaran Anda.</p>
        <a href="{{ route('user.transaksi') }}" class="btn btn-primary mt-3">Kembali ke Transaksi</a>
    </div>
</div>
@endsection
