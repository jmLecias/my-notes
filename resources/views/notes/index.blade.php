<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('faveicon.ico') }}" type="image/x-icon">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>My Notes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        @if (session('success'))
            <div 
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                class="mb-4 p-4 bg-green-100 text-green-800 rounded fixed bottom-5 right-5 shadow-lg"
            >
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        My Notes
                    </h2>
                    <a href="{{ route('notes.create') }}"
                        class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Add Note
                    </a>
                </div>

            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($notes as $note)
                            <div class="bg-white dark:bg-gray-800 p-5 rounded relative">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $note->title }}</h3>
                                <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $note->body }}</p>

                                <div class="absolute bottom-4 right-4 inline-block">
                                    <a href="{{ route('notes.edit', $note) }}"
                                        class="mr-2 px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                            onclick="return confirm('Are you sure you want to delete this note?');">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-200">No notes yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
