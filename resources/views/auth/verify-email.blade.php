@extends('layouts.app')

@section('title', 'Verify Email')

@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card text-center p-4">

                    <div class="mb-3">
                        <i class="bi bi-envelope-check fs-1 text-primary"></i>
                    </div>

                    <h3 class="card-title mb-3">Verify Your Email Address</h3>

                    <p class="card-text">
                        We have sent a verification link to your email address.
                        Please check your inbox and click the link to verify your account.
                    </p>

                    <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
                        @csrf
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-arrow-repeat me-1"></i>
                            Resend Verification Email
                        </button>
                    </form>

                    <hr class="my-4">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-secondary w-100">
                            <i class="bi bi-box-arrow-right me-1"></i>
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
