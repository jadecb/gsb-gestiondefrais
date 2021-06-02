<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FicheDeFrais;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ressources\views;
use Illuminate\Support\Facades\Auth;


class ComptableController extends Controller
{

    public function home()
    {
        return view("comptable.accueil");
    }

    public function ShowRefused()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',3)->simplePaginate(10);

        return view("comptable.fiches_refusees", ['fiches' => $fiches]);
    }

    public function ShowAccepted()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',2)->simplePaginate(10);

        return view("comptable.fiches_acceptees", ['fiches' => $fiches]);
    }

    public function ShowUnprocessed()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',1)->simplePaginate(10);

        return view("comptable.fiches_non_traitees", ['fiches' => $fiches]);
    }

    public function edit(request $request)
    {

        switch($request->get('etat'))
        {
            case "non-traitee":
                $etat = 1;
            break;
            
            case "acceptee":
                $etat = 2;
            break;

            case "refusee":
                $etat = 3;
            break;
        }
        
        $fiche = FicheDeFrais::find($request->get('id'));

        $fiche->etatid = $etat;

        $fiche->save();

        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',1)->get();
        
        if ($fiche->etatid!=2 || $fiche->etatid!=3){
            return redirect()->back()->with('success', 'La fiche a bien été traitée!');
        }
        return redirect()->back()->with('failed', 'Erreur : La fiche n\'a pas pu être traitée. 
                                            Si le problème persiste veuillez contacter un administrateur');
    }

    public function profil()
    {
        return view("comptable.profil");
    }

    public function disconnection()
    {
        auth()->logout();

        return redirect('/');
    }
}
