<x-app-layout>
	<x-slot name="header">
		Create a new client
	</x-slot>
	<livewire:crm.companies.create-form :model="$company" />
</x-app-layout> 
