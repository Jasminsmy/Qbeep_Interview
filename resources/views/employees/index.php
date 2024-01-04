<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees</title>
</head>
<body>
    <h1>List of Employees</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse ($employees as $employee)
            <li>
                <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                <p>Email: {{ $employee->email }}</p>
                <p>Phone: {{ $employee->phone }}</p>
                <p>Company: {{ $employee->company->name }}</p>
                <br>
                <a href="{{ route('employees.show', $employee->id) }}">View Details</a>
            </li>
        @empty
            <li>No employees available.</li>
        @endforelse
    </ul>

    {{ $employees->links() }}
</body>
</html>
