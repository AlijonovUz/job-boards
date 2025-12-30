@extends('layouts.app')

@section('title', 'Create')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Add New Job</h2>
                    <form>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control form-control-lg" id="jobTitle"
                                   placeholder="Enter job title">
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control form-control-lg" id="company"
                                   placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control form-control-lg" id="location"
                                   placeholder="Enter location">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control form-control-lg" id="description" rows="4"
                                      placeholder="Enter job description"></textarea>
                        </div>
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
