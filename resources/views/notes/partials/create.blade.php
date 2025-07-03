<x-modal name="create-note" :show="false" focusable>
    <form
        x-data="{ submitting: false }"
        x-on:submit.prevent="if (!submitting) { submitting = true; $el.submit(); }"
        method="POST" action="{{ route('notes.store') }}" class="p-6"
    >
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
            Create Note
        </h2>

        <div class="mb-4">
            <x-input-label for="title" value="Title" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
        </div>

        <div class="mb-4">
            <x-input-label for="body" value="Body" />
            <textarea name="body" id="body" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white" required></textarea>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>
            <x-primary-button class="ms-3" x-bind:disabled="submitting">
                Save
            </x-primary-button>
        </div>
    </form>
</x-modal>