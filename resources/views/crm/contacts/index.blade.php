<x-app-layout>
	<x-slot name="header">
		Your Contacts for client {{ $company->name }}
	</x-slot>
	<livewire:crm.contact.table :model="$company->contacts()" />
</x-app-layout>
