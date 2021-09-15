<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index'])->name('actors.index.pagination');

Route::get('/tv', [TVController::class, 'index'])->name('tv.index');
Route::get('/tv/{tv}', [TVController::class, 'show'])->name('tv.show');

Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('actors.show');
