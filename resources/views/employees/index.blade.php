@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Employees</h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <div class="mb-3">
            <a href="{{ route('employees.create') }}" class="btn btn-success">Create New Employee</a>
        </div>

        @if ($employees->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">View Details</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No employees available.</p>
        @endif

        {{ $employees->links() }}
    </div>
@endsection
