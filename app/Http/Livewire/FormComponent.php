<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;

class FormComponent extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $model;

    public function mount($model): void
    {
        $this->model = $model;
        $this->form->fill($this->model->toArray());
    }

    protected function getFormModel(): Model
    {
        // Maybe check if it's a builder (query) or a model. See TableComponent
        return $this->model;
    }

    public function save(): void
    {
        if ( ! $this->model->id) {
            $this->model = $this->model->create($this->form->getState());
        } else {
            $this->model->update($this->form->getState());
        }
        $this->emit('saved');
    }
}

