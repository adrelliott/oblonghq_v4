<?php

namespace App\Http\Livewire\Crm\Companies;

use App\Http\Livewire\FormUpdateComponent;
use Filament\Forms\Components as Filament;

class CreateForm extends FormUpdateComponent
{
    // protected $redirect = '/admin/companies';

    // The form properties (matched to model attributes)
    public $name;
    public $description;

    // Define the form
    protected function getFormSchema(): array
    {
        return [
            Filament\TextInput::make('name')
                ->required()
                ->unique(ignorable: $this->model),
            Filament\TextArea::make('description')
        ];
    }

}
