<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PwdController extends Controller
{
    public function addPasswordRequest(Request $request)
    {
        // Système de validation
        $validated = $request->validate([
            'site' => 'required|string|url',
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $userId = Auth::user()->id;

        if($validated) {
            Password::create([
                'site' => $request->site,
                'login' => $request->login,
                'password' => $request->password,
                'user_id' => $userId
            ]);

            return redirect('/dashboard');
        }

    }

    public function show()
    {
        
        $userId = Auth::user()->id;
        $passwords = Password::where('user_id', $userId)->get();
        return view('dashboard', ['passwords' => $passwords]);
    }

    public function getPasswordToEdit($id)
    {
        $password = Password::where('id', $id)->get();
        // dd($password);
        return view('editpassword', ['passwordToEdit' => $password]);
    }

    public function editPassword(Request $request, int $id)
    {
        // Système de validation
        $validated = $request->validate([
            'site' => 'required|string|url',
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        if($validated) {
            Password::where('id', $id)->first()->update([
                'site' => $request->site,
                'login' => $request->login,
                'password' => $request->password,
            ]);
            return redirect('/dashboard');
        }
    }
}