<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permiss;
use App\Models\FicheDeFrais;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ressources\views;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    
    public function home()
    {
        return view("admin.accueil");
    }

    public function showUsers()
    {
        $users = User::simplePaginate(10);

        return view("admin.liste_users", ["users" => $users]);
    }

    public function showVisiteurs()
    {
        $users = User::whereHas('permiss', function($perm) {
            $perm->where('roleid', '=', 2);
        })->simplePaginate(10);

        return view("admin.liste_visiteurs", ["users" => $users]);
    }

    public function showComptables()
    {
        $users = User::whereHas('permiss', function($perm) {
            $perm->where('roleid', '=', 3);
        })->simplePaginate(10);

        return view("admin.liste_comptables", ["users" => $users]);
    }

    public function showAdmins()
    {
        $users = User::whereHas('permiss', function($perm) {
            $perm->where('roleid', '=', 1);
        })->simplePaginate(10);

        return view("admin.liste_admins", ["users" => $users]);
    }

    public function showAllFiles()
    {        
        $fiches = FicheDeFrais::orderBy('date', 'desc')->simplePaginate(10);

        return view("admin.fiches", ["fiches" => $fiches]);
    }

    public function showAccepted()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',2)->simplePaginate(10);

        return view("admin.fiches_acceptees", ['fiches' => $fiches]);
    }

    public function showRefused()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',3)->simplePaginate(10);

        return view("admin.fiches_refusees", ['fiches' => $fiches]);
    }

    public function showUnprocessed()
    {
        $fiches = FicheDeFrais::orderBy('date', 'desc')->where('etatid',1)->simplePaginate(10);

        return view("admin.fiches_non_traitees", ['fiches' => $fiches]);
    }

    public function deleteFile($id)
    {
        $fiche = FicheDeFrais::find($id);
        $fiche->delete();
        return redirect()->back()->with('success', 'La fiche à bien été supprimée.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $permiss = Permiss::find($id);
        $permiss->delete();
        $user->delete();
        return redirect()->back()->with('success', 'L\'utilisateur a bien été supprimé.');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = request('email');
        $permiss = Permiss::find($id);
        $permiss->roleid = request('role');
        
        if (request('password')!=request('password_confirmation')){
            return redirect()->back()->with('failed', 'Erreur : Les mots de passe ne correspondent pas.');
        }
        $user->password = Hash::make(request('password'));
        $permiss->save();
        $user->save();
        return redirect()->back()->with('success', 'L\'utilisateur a bien été modifié.');
    }

    public function newUser()
    {
        return view("admin.add_user");
    }

    public function doNewUser()
    {

        request()->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'password_confirmation'=>['required'],
            'role'=>['required']
        ]);


        $user = new User;
        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = request('email') . '@gsb.com';
        
        if (request('password')!=request('password_confirmation')){
            return redirect()->back()->with('failed', 'Erreur : Les mots de passe ne correspondent pas.');
        }
        
        $user->password = Hash::make(request('password'));
        
        $user->save();


        $permiss = new Permiss;
        $permiss->userid = $user->id;
        
        $role = request('role');
        $permiss->roleid = $role;

        $permiss->save();
        

        $mail = User::where('email',$user->email);

        if($mail)
        {
            return redirect()->back()->with('success', 'Utilisateur correctement créé !');
        }
        return redirect()->back()->with('failed', 'Erreur : L\'utilisateur n\'a pas pu être créé.');
    }

    public function profil()
    {
        return view("admin.profil");
    }
  
    public function disconnection()
    {
        auth()->logout();

        return redirect('/');
    }
}