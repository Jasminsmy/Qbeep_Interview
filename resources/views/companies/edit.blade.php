@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $company->website) }}" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (current)</label>
                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px; max-height: 100px;">
            </div>

            <div class="mb-3">
                <label for="new_logo" class="form-label">New Logo (optional)</label>
                <input type="file" class="form-control" id="new_logo" name="new_logo">
            </div>

            <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
    </div>
@endsection
