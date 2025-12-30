@extends('layouts.app')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Login</h2>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username"
                                   placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                   placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                        <p class="text-center mt-3">Don't have an account? <a href="{{ route('register.index') }}">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
