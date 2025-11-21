@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-xl font-bold mb-4">Invite User</h2>

    @if(session('success'))
        <div class="bg-green-100 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('invitations.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border px-3 py-2 rounded">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Role</label>
            <select name="role_id" class="w-full border px-3 py-2 rounded">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Invitation</button>
    </form>
</div>
@endsection
