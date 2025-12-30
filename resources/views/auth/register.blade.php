@extends('layouts.app')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Register</h2>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username"
                                   placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email"
                                   placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                   placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                   placeholder="Enter confirm password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Register</button>
                        <p class="text-center mt-3">Already have an account? <a
                                href="{{ route('login.index') }}">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
