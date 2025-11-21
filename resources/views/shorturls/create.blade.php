<h2>Create Short URL</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('shorturls.store') }}">
    @csrf
    <label>Original URL:</label>
    <input type="url" name="original_url" placeholder="Enter original URL" required>
    <button type="submit">Create</button>
</form>
