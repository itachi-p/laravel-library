<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

# Middleware ~~ will not allow any users that are not authenticated/logged in.
Route::group(['middleware' => 'auth'], function () {
    Route::get('/index', [AuthorController::class, 'index'])->name('index');

    // AUTHOR - This Route Group will organize or group all routes related to AUTHOR
    Route::group(['prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index'); // author.index
        Route::post('/store', [AuthorController::class, 'store'])->name('store'); // author.store
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('edit'); // author.edit
        Route::patch('/{id}/update', [AuthorController::class, 'update'])->name('update'); // author.update
        Route::get('/{id}/delete', [AuthorController::class, 'delete'])->name('delete'); // author.delete
        Route::delete('/{id}/destroy', [AuthorController::class, 'destroy'])->name('destroy'); // author.destroy
    });

      // BOOKS
    Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
        Route::get  ('/', [BookController::class, 'index'])->name('index');      // book.index
        Route::post('/store', [BookController::class, 'store'])->name('store');  // book.store
        Route::get('/show/{id}', [BookController::class, 'show'])->name('show'); // book.show
    });
});
