<x-app-layout>
	<x-slot name="header">
		Edit a client
	</x-slot>
	<livewire:crm.companies.update-form :model="$company" />
</x-app-layout>
