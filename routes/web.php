<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\ComptableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Connection Routes
|--------------------------------------------------------------------------
*/

Route::get("/", [ConnexionController::class, 'showConnection']);
Route::post("/", [ConnexionController::class, 'doConnection']);


/*
|--------------------------------------------------------------------------
| Middleware Group (check user connection)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'CheckUserConnection'] , function () {


/*
|--------------------------------------------------------------------------
| Visiteur Routes + middleware (check user isVisiteur)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'isVisiteur'] , function () {

Route::group(['prefix' => 'visiteur'], function () {

    Route::get("/accueil", [VisiteurController::class, 'home']);
    Route::get("/saisir-une-fiche", [VisiteurController::class, 'enterFile']);
    Route::post("/saisir-une-fiche", [VisiteurController::class, 'doEnterFile']);
    Route::get("/consulter-mes-fiches", [VisiteurController::class, 'showConsult']);
    Route::get("/consulter-mes-fiches/acceptees", [VisiteurController::class, 'showAccepted']);
    Route::get("/consulter-mes-fiches/refusees", [VisiteurController::class, 'showRefused']);
    Route::get("/consulter-mes-fiches/non-traitees", [VisiteurController::class, 'showUnprocessed']);
    Route::get("/afficher", [VisiteurController::class, 'showFile']);
    Route::get("/profil", [VisiteurController::class, 'profil']);
    Route::get("/deconnexion", [VisiteurController::class, 'disconnection']);

});
});


/*
|--------------------------------------------------------------------------
| Comptable Routes + middleware (check user isComptable)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'isComptable'] , function () {

Route::group(['prefix' => 'comptable'], function () {

    Route::get("/accueil", [ComptableController::class, 'home']);
    Route::get("/fiches-acceptees", [ComptableController::class, 'showAccepted']);
    Route::get("/fiches-refusees", [ComptableController::class, 'showRefused']);
    Route::get("/fiches-non-traitees", [ComptableController::class, 'showUnprocessed']);
    Route::post("/fiches-non-traitees", [ComptableController::class, 'edit']);
    Route::get("/profil", [ComptableController::class, 'profil']);
    Route::get("/deconnexion", [ComptableController::class, 'disconnection']);

});
});


/*
|--------------------------------------------------------------------------
| Admin Routes + middleware (check user isAdmin)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'isAdmin'] , function () {
    
Route::group(['prefix' => 'admin'], function() {

    Route::get("/accueil", [AdminController::class, 'home']);
    Route::get("/liste-utilisateurs", [AdminController::class, 'showUsers']);
    Route::get("/liste-visiteurs", [AdminController::class, 'showVisiteurs']);
    Route::get("/liste-comptables", [AdminController::class, 'showComptables']);
    Route::get("/liste-admins", [AdminController::class, 'showAdmins']);
    Route::get("/les-fiches", [AdminController::class, 'showAllFiles']);
    Route::get("/les-fiches/acceptees", [AdminController::class, 'showAccepted']);
    Route::get("/les-fiches/refusees", [AdminController::class, 'showRefused']);
    Route::get("/les-fiches/non-traitees", [AdminController::class, 'showUnprocessed']);
    Route::get("/les-fiches/delete/{id}", [AdminController::class, 'deleteFile']);
    Route::get("/utilisateur/delete/{id}", [AdminController::class, 'deleteUser']);
    Route::get("/utilisateur/edit/{id}", [AdminController::class, 'editUser']);
    Route::get("/inscription", [AdminController::class, 'newUser']);
    Route::post("/inscription", [AdminController::class, 'doNewUser']);
    Route::get("/profil", [AdminController::class, 'profil']);
    Route::get("/deconnexion", [AdminController::class, 'disconnection']);

});
});


});