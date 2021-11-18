<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Tables;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TableComponent extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $model;
    public $view;

    protected function getTableQuery(): Builder
    {
        return get_class($this->model)::query();
    }

    public function render()
    {
        return view($this->view);
    }
}
