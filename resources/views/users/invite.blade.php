@extends('layouts.app')

@section('content')
<h1>Invite User</h1>

<form method="POST" action="{{ route('users.invite') }}">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Role:</label>
    <select name="role" required>
        @if(Auth::user()->role === 'Admin')
            <option value="Member">Member</option>
            <option value="Admin">Admin</option>
        @elseif(Auth::user()->role === 'SuperAdmin')
            <option value="Admin">Admin</option>
        @endif
    </select>

    @if(Auth::user()->role === 'SuperAdmin')
        <label>Company:</label>
        <select name="company_id">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    @endif

    <button type="submit">Send Invite</button>
</form>
@endsection
