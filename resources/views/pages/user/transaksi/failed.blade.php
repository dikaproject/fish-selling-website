@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>Payment Failed</h1>
    <p>Your payment could not be processed.</p>
    <p>Please try again or contact customer support.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Return to Home</a>
</div>
@endsection
