{{-- <x-app-layout>
   
</x-app-layout> --}}

<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Notes
        </h2>
        <x-primary-button x-data x-on:click.prevent="$dispatch('open-modal', 'create-note')">
            + Add Note
        </x-primary-button>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($notes as $note)
                    <div class="border bg-gray-200 p-4 rounded relative">
                        <h3 class="text-lg font-bold text-gray-800">{{ $note->title }}</h3>
                        <p class="mt-2 text-gray-800">{{ $note->body }}</p>
                        <x-secondary-button
                        class="absolute bottom-2 right-2"
                        x-data
                        x-on:click.prevent="$dispatch('open-modal', 'edit-note-{{ $note->id }}')">
                        Edit
                    </x-secondary-button>
                    
                    @include('notes.partials.edit', ['note' => $note])
                </div>
                @empty
                    <p class="text-gray-200">No notes yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@include('notes.partials.create')
