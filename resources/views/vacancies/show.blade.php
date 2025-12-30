@extends('layouts.app')

@section('title', 'Detail')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card detail-card p-4">
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $vacancy->title }}</h2>
                        <p class="card-subtitle mb-4 text-muted">{{ $vacancy->user->name }}</p>

                        <h5 class="mb-2">Company</h5>
                        <p class="card-text mb-4">
                            {{ $vacancy->company }}
                        </p>

                        <h5 class="mb-2">Location</h5>
                        <p class="card-text mb-4">
                            {{ $vacancy->location }}
                        </p>

                        <h5 class="mb-2">Job Description</h5>
                        <p class="mb-4">
                            {{ $vacancy->description }}
                        </p>

                        <div class="d-flex justify-content-between flex-wrap gap-3">
                            <a href="{{ route('vacancies.index') }}" class="btn btn-secondary btn-lg">Back to Jobs</a>
                            <a href="#" class="btn btn-primary btn-lg">Apply Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
