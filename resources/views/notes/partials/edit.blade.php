<x-modal name="edit-note-{{ $note->id }}" :show="false" focusable>
    <form
        x-data="{ submitting: false }"
        x-on:submit.prevent="if (!submitting) { submitting = true; $el.submit(); }"
        method="POST" action="{{ route('notes.update', $note) }}" class="p-6"
    >
        @csrf
        @method('PUT')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
            Edit Note
        </h2>

        <div class="mb-4">
            <x-input-label for="edit-title-{{ $note->id }}" value="Title" />
            <x-text-input id="edit-title-{{ $note->id }}" name="title" type="text" class="mt-1 block w-full" value="{{ $note->title }}" required autofocus />
        </div>

        <div class="mb-4">
            <x-input-label for="edit-body-{{ $note->id }}" value="Body" />
            <textarea name="body" id="edit-body-{{ $note->id }}" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white" required>{{ $note->body }}</textarea>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>
            <x-primary-button class="ms-3" x-bind:disabled="submitting">
                Update
            </x-primary-button>
        </div>
    </form>
</x-modal>