<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\RecomendationController;

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

//Authenticating 
Auth::routes();

//Route user
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});

// Route Recommender
Route::middleware(['auth','user-role:recommender'])->group(function()
{
    Route::get("/recommender/home",[HomeController::class, 'recommenderHome'])->name("recommender.home");
    Route::get("/recommender/song",[SongController::class, 'index'])->name("recommender.song");
    Route::post('/recommender/song/create', [SongController::class, 'create'])->name('recommender.song.create');
    Route::get("/recommender/recommendation",[RecomendationController::class, 'index'])->name("recommender.recommendation");
    Route::post("/recommender/recommendation",[RecomendationController::class, 'create'])->name("recommender.recommendation.create");

});

// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
    //genre route:
    Route::get("/admin/genre",[GenreController::class, 'index'])->name("admin.genre");
    Route::post('/admin/genre/create', [GenreController::class, 'create'])->name('admin.genre.create');
    Route::get('/admin/genre/show/{id}', [GenreController::class, 'show'])->name('admin.genre.show');
    Route::put('/admin/genre/update/{id}', [GenreController::class, 'update'])->name('admin.genre.update');
    Route::delete('/admin/genre/delete/{id}', [GenreController::class, 'delete'])->name('admin.genre.delete');
});


/* Profile routing */
Route::middleware(['auth','user-role:recommender'])->group(function()
{
    Route::get("/recommender/profile",[HomeController::class, 'recommenderHome'])->name("recommender.home");
});