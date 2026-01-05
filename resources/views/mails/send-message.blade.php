@extends('layouts.app')

@section('title', 'Send Message')

@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 detail-card">
                    <h2 class="card-title mb-4">Send Message</h2>
                    <form method="POST" action="{{ route('mail.store') }}">
                        @csrf
                        <x-form.field name="title" label="Title" placeholder="Enter title" type="text"/>
                        <x-form.field name="message" label="Message" placeholder="Enter message"
                                      type="textarea"/>

                        <div class="d-flex justify-content-between flex-wrap gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">Send</button>
                            <a href="{{ route('vacancies.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
