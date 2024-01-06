@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Company</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (optional)</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>

            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>
    </div>
@endsection
