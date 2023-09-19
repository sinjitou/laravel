<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;

class PwdController extends Controller
{
    public function addPasswordRequest(Request $request)
    {
        // Système de validation
        $validated = $request->validate([
            'link_website' => 'required|string|url',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if($validated) {
            // Encode en JSON 
            $jsonValidated = json_encode($validated); 
            $now = time();
            // Ajouter au fichier password.json
            Storage::put("$now-password.json", $jsonValidated);
            // Rediriger vers la page d'accueil
            return redirect('/');
        }

    }
}