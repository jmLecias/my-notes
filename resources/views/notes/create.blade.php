<x-app-layout>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Note
            </h2>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <form method="POST" action="{{ route('notes.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block font-medium text-sm text-gray-800 dark:text-gray-200">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block font-medium text-sm text-gray-800 dark:text-gray-200">Body</label>
                    <textarea name="body" id="body" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="5"
                        required></textarea>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('notes.index') }}"
                        class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 mr-2">Cancel</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>