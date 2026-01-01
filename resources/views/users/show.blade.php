@extends('layouts.app')

@section('title', $user->name)

@section('main')
    <div class="container my-5">

        <div class="card p-4 mb-5">
            <h3 class="mb-1">{{ $user->name }}</h3>
            <p class="text-muted mb-1">{{ $user->email }}</p>
            <small class="text-secondary">Joined: {{ $user->created_at->format('d F, Y') }}</small>
        </div>

        <h4 class="mb-4 fw-bold">My Vacancies</h4>

        <div class="row g-4">

            @forelse($vacancies as $vacancy)
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4 h-100">
                        <h5 class="card-title">{{ $vacancy->title }}</h5>
                        <p class="card-subtitle mb-3">{{ $vacancy->created_at->format('d F, Y') }}</p>
                        <a href="{{ route('vacancies.show', [$vacancy->id, $vacancy->slug]) }}"
                           class="btn btn-primary btn-sm w-100">View Details</a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center mt-5">
                    <h5 class="text-muted mb-2">No vacancies found</h5>
                    <p class="text-muted">
                        There are no job vacancies available at the moment.
                    </p>
                </div>
            @endforelse

        </div>

        <x-paginator :items="$vacancies"/>

    </div>
@endsection
