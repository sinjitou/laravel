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
use App\Notifications\TeamNotifications;

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

    public function addMemberView(Request $request, int $id)
    {
        // todo => no users already in teams 
        $users = User::where('id', '!=', auth()->id())->get();
        return view('addmember', ['users' => $users, 'id' => $id]);
    }

    public function addMember(Request $request, int $id)
    {
        $validated = $request->validate([
            'users' => 'required',
        ]);

        // user qui ajoute
        $userId = Auth::user()->id;
        $userWhoAdd = User::find($userId);

        // user qui est ajouté
        $userChoiced = $request->users;
        $user = User::find($userChoiced);

        // la team
        $team = Team::where(
            'id', $id,
        )->first();
        
        // Lier l'équipe à l'utilisateur actuel
        $user->teams()->syncWithoutDetaching($team->id);

        // todo => finish notification
        $notification = new TeamsNotifications(
            $user,
            Auth::user(),
        )



        return redirect(route('teams.view'));
    }
    
}