<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\NiveauclassController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\EvaluerController;use App\Models\Inscription;
use App\Models\User;use App\Formation;use App\Models\Ue;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\EnseignerController;
use App\Http\Controllers\EtreresponsableController;
use App\Models\Etreresponsable;use App\Models\Evaluer;
use App\Http\Controllers\GoogleController;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $NombreEtudian = User::where('role', 3)->count();
    $NombreEnseignat = User::where('role', 2)->count();

    $NombreFormation =  Formation::count();
    $NombreUe = Ue::count();

    $NombreEvaluation = Evaluer::count();
    $NombreInscription = Inscription::count();
    $Nombreresponsable = Etreresponsable::count();

    return view('dashboard',compact('NombreEtudian','NombreEnseignat',
    'NombreFormation','NombreUe','NombreEvaluation','NombreInscription','Nombreresponsable'));
})->middleware(['auth', 'verified'])->name('dashboard');




Route::resource('formations',FormationController::class);
Route::resource('classes',ClassController::class);
Route::resource('niveauclasses',NiveauclassController::class);
Route::resource('ues',UeController::class);
Route::resource('ecs',EcController::class);
Route::resource('evaluers',EvaluerController::class);
Route::resource('inscriptions',InscriptionController::class);
Route::resource('enseigners',EnseignerController::class);
Route::resource('etreresponsables',EtreresponsableController::class);

Route::get('/auth/google/redirect', [GoogleController::class ,'redirect']);    
Route::get('/auth/google/callback-url',[GoogleController::class,'callback']);


Route::get('wp-admin.menue',[adminController::class,'menu']);
Route::get('wp-admin.menuef',[adminController::class,'menuf']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
