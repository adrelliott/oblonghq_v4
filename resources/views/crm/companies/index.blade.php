<x-app-layout>
	<x-slot name="header">
		Your clients
	</x-slot>
	<livewire:crm.company.table :model=$company />
</x-app-layout>
