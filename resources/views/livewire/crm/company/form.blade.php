<div>
    <x-slot name="header">
        Client Details:
    </x-slot>
    <form wire:submit.prevent="save">
        {{ $this->form }}
        <button type="submit" class="bg-indigo-700 text-white px-4 py-2">Save</button>
    </form>
</div>
