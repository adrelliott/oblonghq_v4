<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Filament\Forms;
use App\Models\Admin\User;

class EditUser extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $user;
    public $name;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->form->fill([
            'name' => $this->user->name,
            // 'content' => $this->post->content,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.users.edit');
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Tabs::make('Wizard')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Step 1')
                        ->schema([
                            Forms\Components\TextInput::make('name')->required(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Step 2')
                        ->schema([
                            Forms\Components\TextInput::make('name')->label('Step 2 field'),
                        ]),
                    Forms\Components\Tabs\Tab::make('Step 3')
                        ->schema([
                            Forms\Components\TextInput::make('name')->label('Step e field'),
                        ]),
                ])

        ];
        return [
            Forms\Components\Fieldset::make('Label')->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Textarea::make('name')->label('new label'),
            ])
            // ...
        ];
    }
}
