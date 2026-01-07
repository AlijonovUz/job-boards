@extends('layouts.app')

@section('title', $user->name)

@section('main')
    <div class="container my-5" style="max-width: 720px;">

        <div class="card p-5">

            <!-- Header -->
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-1">Edit Profile</h3>
                <p class="text-muted mb-0">Update your personal information</p>
            </div>

            <!-- UPDATE PROFILE -->
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <!-- Basic info -->
                <div class="mb-4">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="bi bi-person-lines-fill me-2"></i>Personal Information
                    </h6>

                    <x-form.field name="name" type="text" label="Full Name" placeholder="Enter your full name"
                                  :value="$user->name"/>

                    <x-form.field name="email" type="email" label="Email" placeholder="Enter your email"
                                  :value="$user->email"/>
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="bi bi-shield-lock-fill me-2"></i>Security
                    </h6>

                    <x-form.field name="current_password" type="password" label="Current Password"
                                  placeholder="Enter current password"/>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form.field name="password" type="password" label="New Password"
                                          placeholder="New password"/>
                        </div>
                        <div class="col-md-6">
                            <x-form.field name="password_confirmation" type="password" label="Confirm Password"
                                          placeholder="Confirm new password"/>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-flex flex-column align-items-center gap-3 mt-5">
                    <button type="submit" class="btn btn-primary w-75 py-2">
                        Save changes
                    </button>

                    <a href="{{ route('vacancies.index') }}"
                       class="btn btn-secondary w-75 py-2 text-center">
                        Cancel
                    </a>
                </div>
            </form>

            <!-- Danger Zone -->
            <div class="mt-5 pt-4 border-top">

                <div class="p-4 rounded-4"
                     style="
            background: linear-gradient(135deg, #fff5f5, #ffe3e3);
            box-shadow: inset 0 0 0 1px rgba(220,53,69,.25);
         ">

                    <h6 class="fw-bold text-danger mb-2 d-flex align-items-center">
                        <i class="bi bi-exclamation-octagon-fill me-2 fs-5"></i>
                        Danger Zone
                    </h6>

                    <p class="text-danger small mb-4">
                        This action is irreversible. Once your account is deleted,
                        all associated data will be permanently removed.
                    </p>

                    <form method="POST" action="{{ route('profile.delete') }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger px-4 py-2 rounded-pill d-inline-flex align-items-center gap-2">
                            <i class="bi bi-trash-fill"></i>
                            Delete Account
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
