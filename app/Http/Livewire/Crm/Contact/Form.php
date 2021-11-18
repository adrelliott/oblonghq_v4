<?php

namespace App\Http\Livewire\Crm\Contact;

use App\Http\Livewire\FormComponent;
use Filament\Forms\Components as Filament;

use App\Models\Crm\Contact;

class Form extends FormComponent
{
    // The form properties (matched to model attributes)
    public $first_name;
    public $last_name;

    // Behaviour
    public $view = 'livewire.crm.contact.form';
    public $redirectRoute = 'companies.index';

    public function mount(Contact $contact): void
    {
        $this->model = $contact;
        $this->form->fill($this->model->toArray());
    }

    protected function getFormSchema(): array
    {
        return [
            Filament\TextInput::make('first_name')
                ->required()
                ->unique(ignorable: $this->model),
            Filament\TextInput::make('company_id')->disabled()
        ];
    }

}
