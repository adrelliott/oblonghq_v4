<?php

namespace App\Http\Livewire\Crm\Contact;

use App\Http\Livewire\FormComponent;
use Filament\Forms\Components as Filament;

class Form extends FormComponent
{
    // The form properties (matched to model attributes)
    public $first_name;
    public $last_name;
    public $company;

    protected function getFormSchema(): array
    {
        return [

            Filament\TextInput::make('first_name')
                ->required()
                ->unique(ignorable: $this->model),

            Filament\TextInput::make('company.name')
                ->model($this->model->company->name)
                ->disabled()
                ->label('Employer')
        ];
    }

}
