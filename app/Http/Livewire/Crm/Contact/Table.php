<?php

namespace App\Http\Livewire\Crm\Contact;

use App\Http\Livewire\TableComponent;
use Filament\Tables as Filament;


// use Illuminate\Database\Eloquent\Builder;

class Table extends TableComponent
{

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
