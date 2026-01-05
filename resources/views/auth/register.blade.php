@extends('layouts.app')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Register</h2>
                    <form method="POST" novalidate>
                        @csrf
                        <x-form.field name="name" type="text" label="Full Name" placeholder="Enter your full name"/>
                        <x-form.field name="email" type="email" label="Email" placeholder="Enter your email"/>
                        <x-form.field name="password" type="password" label="Password" placeholder="Enter password"/>
                        <x-form.field name="password_confirmation" type="password" label="Confirm Password"
                                      placeholder="Enter confirm password"/>

                        <div class="mb-4">
                            <label class="form-label">I am here to</label>

                            <div class="d-flex gap-4">
                                <x-form.radio
                                    name="role"
                                    value="job_seeker"
                                    label="Find a job"
                                    :checked="true"
                                />

                                <x-form.radio
                                    name="role"
                                    value="employer"
                                    label="Post a job"
                                />
                            </div>
                            
                            @error('role')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Register</button>
                        <p class="text-center mt-3">Already have an account? <a class="text-decoration-none"
                                                                                href="{{ route('login') }}">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
