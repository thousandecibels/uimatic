<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Upload') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upload a new CSV file') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="file" value="{{ __('CSV file') }}" />
            <x-jet-input id="file" type="file" class="mt-1 block w-full" wire:model.defer="file" />
            <x-jet-input-error for="file" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
