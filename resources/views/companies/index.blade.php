@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Companies</h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <div class="mb-3">
            <a href="{{ route('companies.create') }}" class="btn btn-success">Create New Company</a>
        </div>

        @if ($companies->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">View Details</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No companies available.</p>
        @endif

        {{ $companies->links() }}
    </div>
@endsection
