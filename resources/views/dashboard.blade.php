@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-2">Welcome, {{ auth()->user()->name }}!</h1>
    <p class="mb-4">Your role: {{ auth()->user()->role ? auth()->user()->role->name : 'Not assigned' }}</p>

    <p>Use the navigation above to manage URLs and users based on your role.</p>
</div>
@endsection
