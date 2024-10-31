@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Pembayaran Berhasil</h1>
        <p>Anda akan diarahkan ke halaman utama dalam 5 detik.</p>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = "{{ url('/') }}";
        }, 5000);
    </script>
@endsection
