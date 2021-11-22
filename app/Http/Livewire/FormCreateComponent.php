<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use App\Providers\RouteServiceProvider;

class FormCreateComponent extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $model;
    protected $redirect = RouteServiceProvider::HOME;

    public function mount($model): void
    {
        $this->model = $model;
    }

    protected function getFormModel(): Model
    {
        // Maybe check if it's a builder (query) or a model. See TableComponent
        return $this->model;
    }

    public function create()
    {
        $this->beforeCreate();
        $this->model = $this->model->create($this->form->getState());
        $this->emit('saved');
        return redirect($this->redirect);
    }

    protected function beforeCreate(){}
}

