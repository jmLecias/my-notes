<x-app-layout>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                View Note
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ $note->title }}
                </h3>
                <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">
                    {{ $note->body }}
                </p>
            </div>

            <div class="mt-6">
                <a href="{{ route('notes.index') }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ← Back to Notes
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
