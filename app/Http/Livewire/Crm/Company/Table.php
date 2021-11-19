<?php

namespace App\Http\Livewire\Crm\Company;

use App\Http\Livewire\TableComponent;
use Filament\Tables as Filament;

class Table extends TableComponent
{

    // Define the table
     protected function getTableColumns(): array
    {
        return [
            Filament\Columns\TextColumn::make('id'),
            Filament\Columns\TextColumn::make('name'),
            Filament\Columns\TextColumn::make('description'),
            Filament\Columns\TextColumn::make('tenant_id'),
        ];
    }
}
