<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FicheDeFrais;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ressources\views;
use Illuminate\Support\Facades\Auth;


class VisiteurController extends Controller
{
    
    public function home()
    {
        return view("visiteur.accueil");
    }

    public function enterFile()
    {
        return view("visiteur.add_fiche");
    }

    public function doEnterFile()
    {
        $id = auth()->user()->id;

        $fichedefrais = new FicheDeFrais;
        $fichedefrais->date = request('date');
        $fichedefrais->description = request('description');
        $fichedefrais->deplacement = request('deplacement');
        $fichedefrais->restauration = request('restauration');
        $fichedefrais->hebergement = request('hebergement');
        $fichedefrais->autres = request('autres');
        $fichedefrais->userid = $id;

        $fichedefrais->save();

        $fiche = FicheDeFrais::where('description',$fichedefrais->description);

        if($fiche)
        {
            return redirect()->back()->with('success', 'La fiche a bien été ajoutée !');
        }
        return redirect()->back()->with('failed', 'La fiche n\'a pas pu être ajoutée.');
    }

    public function showConsult()
    {
        $id = auth()->user()->id;
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('userid', $id)->simplePaginate(10);

        return view("visiteur.fiches", ["fiches" => $fiches]);
    }

    public function showAccepted()
    {
        $id = auth()->user()->id;
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',2)->where('userid', $id)->simplePaginate(10);

        return view("visiteur.fiches_acceptees", ['fiches' => $fiches]);
    }

    public function showRefused()
    {
        $id = auth()->user()->id;
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',3)->where('userid', $id)->simplePaginate(10);

        return view("visiteur.fiches_refusees", ['fiches' => $fiches]);
    }

    public function showUnprocessed()
    {
        $id = auth()->user()->id;
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',1)->where('userid', $id)->simplePaginate(10);

        return view("visiteur.fiches_non_traitees", ['fiches' => $fiches]);
    }

    public function profil()
    {
        return view("visiteur.profil");
    }

    public function disconnection()
    {
        auth()->logout();

        return redirect('/');
    }
}