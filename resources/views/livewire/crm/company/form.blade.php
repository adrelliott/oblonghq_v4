<div>
    <form wire:submit.prevent="save">
        {{ $this->form }}
        <button type="submit" class="bg-indigo-700 text-white px-4 py-2">Save</button>
    </form>
</div>
