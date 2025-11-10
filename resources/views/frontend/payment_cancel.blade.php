@extends('frontend.layouts.master')

@section('title', 'Payment Cancelled')

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <img src="{{ asset('frontend/img/payment-failed.png') }}" alt="Cancelled" width="100">
        </div>

        <h2 class="text-danger mb-3">Payment Cancelled</h2>
        <p class="mb-4">
            Your payment was cancelled or failed. If any amount was deducted, it will be refunded automatically within a few days.
        </p>

        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="fa fa-arrow-left me-1"></i> Back to Home
        </a>
    </div>
</div>
@endsection
