<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\View\View;

class FormComponent extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $model;
    public $view;
    public $redirectRoute;

    protected function getFormModel(): Model
    {
        return $this->model;
    }

    public function render(): View
    {
        return view($this->view);
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

