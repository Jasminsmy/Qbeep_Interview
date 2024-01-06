@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>

        <p><strong>Email:</strong> {{ $company->email }}</p>
        <p><strong>Website:</strong> {{ $company->website }}</p>

        <div class="mb-3">
            <strong>Logo:</strong>
            <br>
            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 200px; max-height: 200px;">
        </div>

        <div class="mb-3">
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit Company</a>
        </div>

        <h2>Employees</h2>

        @if ($company->employees->count() > 0)
            <ul>
                @foreach ($company->employees as $employee)
                    <li>
                        <a href="{{ route('employees.show', $employee->id) }}">{{ $employee->full_name }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No employees in this company.</p>
        @endif

    </div>
@endsection
