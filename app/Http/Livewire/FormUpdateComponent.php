<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Usernotnull\Toast\Concerns\WireToast;

class FormUpdateComponent extends Component implements Forms\Contracts\HasForms
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
        return $this->model;
    }

    public function save(): void
    {
        $this->beforeSave();
        $this->model->update($this->form->getState());
        $this->emit('saved');
    }

    protected function beforeSave(){}
}

