@extends('layouts.app')

@section('main')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Available Jobs</h1>

        <!-- Search -->
        <form class="d-flex mb-5 justify-content-center" method="GET">
            <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}"
                   placeholder="Search jobs..."
                   style="width: 50%;"
                   aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

        <!-- Job List (6 cards per page) -->
        <div class="row g-4">

            @forelse($vacancies as $vacancy)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vacancy->title }}</h5>
                            <p class="card-text">{{ $vacancy->company }} - {{ $vacancy->location }}</p>
                            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="btn btn-primary">View
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

            @if($vacancies->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">

                        <li @class(['page-item', 'disabled' => $vacancies->onFirstPage()])>
                            <a class="page-link" href="{{ $vacancies->previousPageUrl() }}">«</a>
                        </li>

                        @php
                            $current = $vacancies->currentPage();
                            $last = $vacancies->lastPage();

                            $start = max(1, $current - 2);
                            $end = min($last, $current + 2);
                        @endphp

                        @for($i = $start; $i <= $end; $i++)
                            @if($i == $current)
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $vacancies->url($i) }}">{{ $i }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $vacancies->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        <li @class(['page-item', 'disabled' => $vacancies->onLastPage()])>
                            <a class="page-link" href="{{ $vacancies->nextPageUrl() }}">»</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
@endsection
