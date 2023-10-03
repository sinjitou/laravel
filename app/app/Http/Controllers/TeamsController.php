<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    public function createTeam(Request $request)
    {
        
        $validated = $request->validate([
            'team' => 'required|string|unique:teams,name',
        ]);
        
        $team = Team::create([
            'name' => $request->team,
        ]);
        $userId = Auth::user()->id;

        $user = User::find($userId);

        // Lier l'équipe à l'utilisateur actuel
        $user->teams()->syncWithoutDetaching($team->id);

        return redirect(route('teams.view'));
        
    }

    public function show()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $allteams = $user->teams;
        return view('teams', ['teams' => $allteams]);
    }
}