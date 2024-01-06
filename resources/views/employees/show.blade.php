@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $employee->full_name }}</h1>

        <p><strong>ID:</strong> {{ $employee->id }}</p>
        <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
        <p><strong>Company:</strong> {{ $employee->company->name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone }}</p>

        <div class="mb-3">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit Employee</a>
        </div>
    </div>
@endsection
