<x-app-layout>
	<x-slot name="header">
		Create a new client
	</x-slot>
	<livewire:crm.contacts.form :model="$contact" />
</x-app-layout>
