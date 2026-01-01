@extends('layouts.app')

@section('main')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Available Jobs</h1>

        <form class="d-flex mb-5 justify-content-center" method="GET">
            <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}"
                   placeholder="Search jobs..."
                   style="width: 50%;"
                   aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

        <div class="row g-4">

            @forelse($vacancies as $vacancy)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($vacancy->title, 28) }}</h5>
                            <p class="card-text">{{ $vacancy->created_at->format('d F, Y') }}</p>
                            <a href="{{ route('vacancies.show', [$vacancy->id, $vacancy->slug]) }}"
                               class="btn btn-primary">View
                                Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center mt-5">
                    <h5 class="text-muted mb-2">No vacancies found</h5>

                    @if(request('search'))
                        <p class="text-muted">
                            We couldn’t find any jobs matching
                            <strong>"{{ request('search') }}"</strong>.
                        </p>
                        <a href="{{ route('vacancies.index') }}" class="btn btn-primary btn-lg">
                            View all jobs
                        </a>
                    @else
                        <p class="text-muted">
                            There are no job vacancies available at the moment.
                        </p>
                    @endif
                </div>
            @endforelse

            <x-paginator :items="$vacancies"/>
        </div>
@endsection
