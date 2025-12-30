@extends('layouts.app')

@section('title', 'Create')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Add New Job</h2>
                    <form method="POST" action="{{ route('vacancies.store') }}">
                        @csrf
                        <x-form.field name="title" label="Job Title" placeholder="Enter job title" type="text"/>
                        <x-form.field name="company" label="Company" placeholder="Enter company name" type="text"/>
                        <x-form.field name="location" label="Location" placeholder="Enter location" type="text"/>
                        <x-form.field name="description" label="Job Description" placeholder="Enter job description"
                                      type="textarea"/>

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
