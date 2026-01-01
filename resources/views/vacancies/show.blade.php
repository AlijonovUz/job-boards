@extends('layouts.app')

@section('title', $vacancy->title)

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card detail-card p-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="card-title mb-0">{{ $vacancy->title }}</h2>

                            <div class="d-flex gap-2">
                                @can('update', $vacancy)
                                    <a href="{{ route('vacancies.edit', [$vacancy->id, $vacancy->slug]) }}"
                                       class="btn btn-outline-warning btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                       style="width:36px; height:36px;"
                                       data-bs-toggle="tooltip"
                                       title="Edit vacancy">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                @can('delete', $vacancy)
                                    <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:36px; height:36px;"
                                                data-bs-toggle="tooltip"
                                                title="Delete vacancy">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>

                        <p class="card-subtitle mb-4 text-muted">{{ $vacancy->user->name }}</p>

                        <h5 class="mb-2">Company & Location</h5>
                        <p class="card-text mb-4">
                            {{ $vacancy->company }} - {{ $vacancy->location }}
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
