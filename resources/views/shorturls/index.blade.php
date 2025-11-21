<h2>Short URLs</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Create button only for Admin or Member -->
@role('Admin|Member')
    <a href="{{ route('shorturls.create') }}">Create New Short URL</a>
@endrole

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Short URL</th>
            <th>Original URL</th>
            @role('SuperAdmin|Admin')
                <th>Created By</th>
            @endrole
            @role('SuperAdmin')
                <th>Company</th>
            @endrole
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($urls as $url)
            <tr>
                <td><a href="{{ url('/r/'.$url->short_code) }}">{{ $url->short_code }}</a></td>
                <td>{{ $url->original_url }}</td>
                @role('SuperAdmin|Admin')
                    <td>{{ $url->user->name }}</td>
                @endrole
                @role('SuperAdmin')
                    <td>{{ $url->company->name ?? '-' }}</td>
                @endrole
                <td>{{ $url->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
