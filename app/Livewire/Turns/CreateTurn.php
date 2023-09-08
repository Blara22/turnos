<?php

namespace App\Livewire\Turns;

use App\Models\Turn;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTurn extends Component
{
    public $type = 'Duda';
    #[Locked]
    public $user_id = 0;
    public $attended = false;
    #[Locked]
    public $team_id = 0;

    public function mount(){
        $this->user_id = Auth::user()->id;
        $this->team_id = Auth::user()->currentTeam->id;
    }

    public function render()
    {
        return view('livewire.turns.create-turn');
    }

    public function save()
    {
        Turn::query()->updateOrCreate([
            'user_id' => $this->user_id,
            'team_id' => $this->team_id,
            'attended' => false
        ],
        [
            'type' => $this->type,
        ]);

        return redirect()->to('/turns');
    }
}
