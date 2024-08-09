<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showLoginAdmin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request): RedirectResponse
    {
        // dd($request->all());
        try {
            // Valider les informations d'identification de l'utilisateur
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Tenter de connecter l'utilisateur
            if (Auth::attempt($credentials)) {
                // $request->session()->regenerate();
                $request->session()->put('key', 'value');

                // Rediriger l'utilisateur vers le tableau de bord Filament
                // return redirect()->route('filament.pages.dashboard');
                return redirect()->route('filament.gunivers.pages.dashboard');
            } else {
                // Si l'authentification échoue, renvoyer l'utilisateur vers la page de connexion avec une erreur
                // return back()->withErrors([
                //     'email' => 'Les informations d\'identification fournies ne sont pas valides.',
                // ]);
            }
            // Si l'authentification échoue, renvoyer l'utilisateur vers la page de connexion personnalisée avec une erreur
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne sont pas valides.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            //throw $th;
            dd($e);
        }
    }
}
