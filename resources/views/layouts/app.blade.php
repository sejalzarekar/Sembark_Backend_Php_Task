<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine.js for mobile menu toggle -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Logo -->
                <div class="text-2xl font-bold text-blue-600">
                    URL Shortener
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 items-center">
                    @role('SuperAdmin')
                        <x-nav-link href="{{ route('shorturls.index') }}">All URLs</x-nav-link>
                        <x-nav-link href="{{ route('invitations.create') }}">Invite Admin</x-nav-link>
                    @endrole

                    @role('Admin')
                        <x-nav-link href="{{ route('shorturls.index') }}">Company URLs</x-nav-link>
                        <x-nav-link href="{{ route('shorturls.create') }}">Create Short URL</x-nav-link>
                        <x-nav-link href="{{ route('invitations.create') }}">Invite User</x-nav-link>
                    @endrole

                    @role('Member')
                        <x-nav-link href="{{ route('shorturls.index') }}">My URLs</x-nav-link>
                        <x-nav-link href="{{ route('shorturls.create') }}">Create Short URL</x-nav-link>
                    @endrole

                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-700 focus:outline-none">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <div x-show="open" class="mt-2 space-y-2 flex flex-col bg-white shadow-md p-4 rounded">
                        @role('SuperAdmin')
                            <x-nav-link href="{{ route('shorturls.index') }}">All URLs</x-nav-link>
                            <x-nav-link href="{{ route('invitations.create') }}">Invite Admin</x-nav-link>
                        @endrole

                        @role('Admin')
                            <x-nav-link href="{{ route('shorturls.index') }}">Company URLs</x-nav-link>
                            <x-nav-link href="{{ route('shorturls.create') }}">Create Short URL</x-nav-link>
                            <x-nav-link href="{{ route('invitations.create') }}">Invite User</x-nav-link>
                        @endrole

                        @role('Member')
                            <x-nav-link href="{{ route('shorturls.index') }}">My URLs</x-nav-link>
                            <x-nav-link href="{{ route('shorturls.create') }}">Create Short URL</x-nav-link>
                        @endrole

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 w-full">
                                    Logout
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-6">
        @yield('content')
    </main>

</body>
</html>
