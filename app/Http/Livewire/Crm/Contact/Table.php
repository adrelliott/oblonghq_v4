<?php

namespace App\Http\Livewire\Crm\Contact;

use App\Http\Livewire\TableComponent;
use Filament\Tables as Filament;

use App\Models\Crm\Contact;

class Table extends TableComponent
{
    public function mount(Contact $contact)
    {
        $this->model = $contact;
        $this->view = 'livewire.crm.contact.table';
    }

     protected function getTableColumns(): array
    {
        return [
            Filament\Columns\TextColumn::make('id'),
            Filament\Columns\TextColumn::make('first_name'),
            Filament\Columns\TextColumn::make('last_name'),
            Filament\Columns\TextColumn::make('company_id'),
        ];
    }
}
