<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Companies</title>
</head>
<body>
    <h1>List of Companies</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse ($companies as $company)
            <li>
                <strong>{{ $company->name }}</strong>
                <p>Email: {{ $company->email }}</p>
                <p>Website: {{ $company->website }}</p>
                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px; max-height: 100px;">
                <br>
                <a href="{{ route('companies.show', $company->id) }}">View Details</a>
            </li>
        @empty
            <li>No companies available.</li>
        @endforelse
    </ul>

    {{ $companies->links() }}
</body>
</html>
