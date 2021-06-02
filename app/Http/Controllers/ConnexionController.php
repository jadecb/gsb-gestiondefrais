<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function showConnection()
    {
        if(auth()->check())
        {
            $role = auth()->user()->permiss->role->libelle;
            switch($role) 
            {
                case 'Visiteur':
                    return redirect('/visiteur/accueil');
                case 'Comptable':
                    return redirect('/comptable/accueil');
                case 'Admin':
                    return redirect('/admin/accueil');
            }
        }

        return view("connexion");
    }

    public function doConnection() 
    {
        request()->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if($result)
        {
            $role = auth()->user()->permiss->role->libelle;
            switch($role) 
            {
                case 'Visiteur':
                    return redirect('/visiteur/accueil');
                case 'Comptable':
                    return redirect('/comptable/accueil');
                case 'Admin':
                    return redirect('/admin/accueil');
            }
        }
  
        return back();
    }
}
