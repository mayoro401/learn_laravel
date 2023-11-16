<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accueil;
use App\Models\Post;

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

Route::get('/blog', function (Request $request) {


    //ajouter un noveau article
    // $post=new \App\Models\Post();
    // $post->title="article numero 2";
    // $post->Slug="mon second arcticle";
    // $post->content="mon contenu 2";
    // $post->save();

    //modifier
    // $post = \App\Models\Post::find(1);
    // $post->title="article numero ";
    // $post-> save();

    // $post = \App\Models\Post::create([
    //     'title' => 'article numero 3',
    //     'slug' =>'mon 3er article',
    //     'content' =>'mon contenu 3'
    // ]);
    
    // return $post;
    // return \App\Models\Post::all(['id', 'title', 'content']);
    // $post= \App\Models\Post::all();
    // $post= \App\Models\Post::paginate();

    // dd($post[0]->first());
    // dd($post);

    // return $post;

    // $posts = new Post();
    // $posts->title="article numero 6";
    // $posts->Slug="mon 6er article";
    // $posts->content="mon contenu 5er article";
    // $posts->save();

    $posts= Post::findOrFail(1);
    return $posts;

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

//groupage des routes
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

