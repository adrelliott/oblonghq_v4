<?php

namespace App\Http\Livewire\Admin\Users;

// use App\Http\Livewire\TableComponent;
use Filament\Tables as Filament;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Admin\User;

// use Illuminate\Contracts\View\View;

class ListUsers
{

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    public function render()
    {
        return view('livewire.admin.users.list-users');
    }

    protected function getTableColumns(): array
    {
        return [
            Filament\Columns\TextColumn::make('name'),
            Filament\Columns\TextColumn::make('email'),
        ];
    }
}
