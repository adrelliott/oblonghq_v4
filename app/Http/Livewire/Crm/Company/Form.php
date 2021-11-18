<?php

namespace App\Http\Livewire\Crm\Company;

use App\Http\Livewire\FormComponent;
use Filament\Forms\Components as Filament;

use App\Models\Crm\Company;

class Form extends FormComponent
{
    // The form properties (matched to model attributes)
    public $name;
    public $description;

    // Behaviour
    public $view = 'livewire.crm.company.form';
    public $redirectRoute = 'companies.index';

    public function mount(Company $company): void
    {
        $this->model = $company;
        $this->form->fill($this->model->toArray());
    }

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
