@extends('layouts.app')

@section('title', 'Create')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Add New Job</h2>
                    <form method="POST" action="{{ route('vacancies.update', $vacancy) }}">
                        @csrf
                        @method('PATCH')
                        <x-form.field name="title" label="Job Title" placeholder="Enter job title" type="text"
                                      :value="$vacancy->title"/>
                        <x-form.field name="company" label="Company" placeholder="Enter company name" type="text"
                                      :value="$vacancy->company"/>
                        <x-form.field name="location" label="Location" placeholder="Enter location" type="text"
                                      :value="$vacancy->location"/>
                        <x-form.field name="description" label="Job Description" placeholder="Enter job description"
                                      type="textarea" :value="$vacancy->description"/>
                        <div class="d-flex justify-content-between flex-wrap gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">Add Job</button>
                            <a href="{{ route('vacancies.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
