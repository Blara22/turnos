<?php

namespace App\Http\Controllers;

use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Auth::user()->currentTeam->id;

        $doubts = $this->getListQuery($team)->where('type', 'Duda')->get();

        $revisions = $this->getListQuery($team)->where('type', 'Revisión')->get();

        return view('turns.index', compact('doubts', 'revisions'));
    }

    public function getListQuery($team){
        return Turn::query()
            ->orderBy('created_at', 'ASC')
            ->where('team_id', $team)
            ->where('attended', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $turns = Turn::where('user_id', $user->id)->where('attended', 0)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turn $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turn $turno)
    {
        //
    }

    public function markAsAttended(Turn $turn){
        $turn->update(['attended' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turn $turno)
    {
        //
    }
}
