@extends('layouts.app')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Login</h2>
                    <form method="POST">
                        @csrf
                        <x-form.field name="email" type="email" label="Email" placeholder="Enter your email"/>
                        <x-form.field name="password" type="password" label="Password" placeholder="Enter password"/>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                        <p class="text-center mt-3">Don't have an account? <a class="text-decoration-none"
                                                                              href="{{ route('register.index') }}">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
