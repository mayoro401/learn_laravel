<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accueil;

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


Route::get('/user', function(){
    return 'Bye user';
});

Route::get('/admin', function(){
    return view('admin');
});


Route::get('/tableauparam', function(){
    return [
        "name" => $_GET['name'],
        "description"=>"etudiant"
    ];
});
Route::get('/tableau', function(Request $request){
    return [
        // "name" => $request -> path(),       
        // "name" => $request -> url(),
        "name" => $request -> all(),
        "description"=>"etudiant"
    ];
});

Route::get('/user/{produits}-{id}', function($id){
    return [
        "id" => $id,
    ];
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        // Correspond à l'URL /admin/dashboard
        return 'bienvenue dans le dashboard ';
    });
    Route::get('/utilisateurs', function () {
        // Correspond à l'URL /admin/utilisateurs
        return 'bienvenue dans le utilisateurs ';
    });
});

//route avec controller
Route::get('/accueil', [Accueil::class, 'index'])->name('accueil');

