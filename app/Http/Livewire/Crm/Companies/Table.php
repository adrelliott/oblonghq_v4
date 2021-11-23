<?php

namespace App\Http\Livewire\Crm\Companies;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Actions\ButtonAction;
use Filament\Tables\Actions\IconButtonAction;
Use App\Models\Crm\Company;

class Table extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Company::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('stage_id'),
            Tables\Columns\TextColumn::make('created_at')->label('Created'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            // Filter::make('Prospect')
            //     ->query(function (Builder $query) {
            //         return $query->where('stage_id', 1);
            //     }),
            SelectFilter::make('status')
                ->options([
                    '1' => 'Prospect',
                    '2' => 'Lead',
                    '3' => 'Client',
                    '4' => 'Closed',
                ])
                ->column('stage_id'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ButtonAction::make('edit')
                ->url(function (Company $record) {
                    return route('companies.edit', $record);
                })
                ->label('Edit')
                ->color('success')
                ->icon('heroicon-o-pencil'),
        ];
    }

}
