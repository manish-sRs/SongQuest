<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

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


Route::get("/",[HomeController::class, 'index'])->name('landingPage');

//Authenticating 
Auth::routes();

//Route user
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});

Route::middleware(['auth'])->group(function()
{
   // Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});


// Route Recommender
Route::middleware(['auth','user-role:recommender'])->group(function()
{
    //home
    Route::get("/recommender/home",[HomeController::class, 'recommenderHome'])->name("recommender.home");
    
    //recommendation
    Route::get("/recommender/recommendation",[RecomendationController::class, 'index'])->name("recommender.recommendation");
    Route::post("/recommender/recommendation",[RecomendationController::class, 'create'])->name("recommender.recommendation.create");
    Route::get("/recommender/recommendation/myrecommendation",[RecomendationController::class, 'myrecommendation'])->name("myrecommendation");
    Route::post("/recommender/recommendation/myrecommendation/edit",[RecomendationController::class, 'edit'])->name("recommendation.edit");
    Route::get("/recommender/recommendation/detail/{id}",[RecomendationController::class, 'recommendation_detail'])->name("recommendation_detail");
    Route::get("/recommender/recommendation/myrecommendation/delete/{id}",[RecomendationController::class, 'delete'])->name("recommendation.delete");

    //profile
    Route::get("/recommender/profile/{id}",[UserController::class, 'profile'])->name("recommender.profile");
    Route::post("/recommender/profile/edit",[UserController::class, 'edit'])->name("recommender.ProfileEdit");
    Route::post('/recommender/change-password',[UserController::class, 'changePassword'])->name('change.password');

    //Ratings:
    Route::post("/recommender/myrecommendation/addRating",[RecomendationController::class, 'giveRating'])->name("giveRating");

    //songs:
    Route::get("/recommender/song/view/{id}",[SongController::class, 'songDetail'])->name("recommendation.songs.detail");
    Route::get("/recommender/songview",[SongController::class, 'songview'])->name("recommender.songview");
    Route::get("/recommender/song",[SongController::class, 'index'])->name("recommender.song");
    Route::post('/recommender/song/create', [SongController::class, 'create'])->name('recommender.song.create');
    // Route::get("/recommender/song/view/{id}",[SongController::class, 'songDetail'])->name("recommender.songview.detail");

    //Recommendaion algorithm:
    Route::get("/recommender/recommendation/algorithmrecommendation",[RecomendationController::class, 'algorecommendation'])->name("algoRecommendation");

});

// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    //Home:
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    Route::get("/admin/home/delete/{id}",[UserController::class, 'delete'])->name("user.delete");
    
    //genre route:
    Route::get("/admin/genre",[GenreController::class, 'index'])->name("admin.genre");
    Route::post('/admin/genre/create', [GenreController::class, 'create'])->name('admin.genre.create');
    Route::get('/admin/genre/show/{id}', [GenreController::class, 'show'])->name('admin.genre.show');
    Route::put('/admin/genre/update/{id}', [GenreController::class, 'update'])->name('admin.genre.update');
    Route::delete('/admin/genre/delete/{id}', [GenreController::class, 'delete'])->name('admin.genre.delete');
    
    //songs:
    Route::get("/admin/songs",[SongController::class, 'showSong'])->name("admin.songs");
    Route::get("/admin/song/view/{id}",[SongController::class, 'songDetail'])->name("admin.songs.detail");
    
    //Recommendation
    Route::get("/admin/adminrecommendationview",[RecomendationController::class, 'recViewAdmin'])->name("adminRecView");
    Route::get("/admin/recViewAdmin{id}",[RecomendationController::class, 'viewRecAdmin'])->name("viewRecAdmin");
    Route::get("/admin/recViewAdmin/delete/{id}",[RecomendationController::class, 'adminRecDelete'])->name("adminRec.delete");
   
    //News routes:
    Route::resource('news', NewsController::class)->names([
        'index' => 'admin.news',
     ]);
    
    Route::resource('edit', NewsController::class)->names([
        'edit' => 'admin.edit',
     ]);

    Route::post('update', [NewsController::class, 'update'])->name('news.update');
    Route::get("/admin/news/delete/{id}",[NewsController::class, 'destroy'])->name("news.delete");
    
     


});


/* Profile routing */
