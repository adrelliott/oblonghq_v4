<?php

namespace App\Http\Livewire\Crm\Company;

use App\Http\Livewire\FormComponent;
use Filament\Forms\Components as Filament;

class Form extends FormComponent
{
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
