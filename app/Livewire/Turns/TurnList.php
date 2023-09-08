<?php

namespace App\Livewire\Turns;

use App\Models\Turn;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TurnList extends Component
{
    //TODO: Convertir a computed
    public $doubts = [];
    public $revisions = [];

    public function render()
    {
        return view('livewire.turns.index');
    }

    public function mount(){
        $team = Auth::user()->currentTeam->id;

        $this->doubts = $this->getListQuery($team)->where('type', 'Duda')->get();

        $this->revisions = $this->getListQuery($team)->where('type', 'Revisión')->get();

    }

    public function markAsAttended(Turn $turn){
        $turn->attended = 1;
        $turn->save();

        $turns = ($turn->type == 'Duda' ? $this->doubts : $this->revisions);
        $turnIndex = $turns->search(function($t) use ($turn){
            return $turn->id === $t->id;
        });

        $turns[$turnIndex]->attended = true;
    }

    public function getListQuery($team){
        return Turn::query()
            ->orderBy('created_at', 'ASC')
            ->where('team_id', $team)
            ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()]);
            //->where('attended', 0);
    }
}
