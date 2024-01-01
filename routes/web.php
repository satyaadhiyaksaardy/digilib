<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
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
    return view('landing');
});

Route::middleware('auth')->group(function () {
    Route::get('/notifications/clear', function () {
        auth()->user()->notifications()->delete();
        return redirect()->back();
    })->name('notifications.clear');

    Route::get('/books/download/{book}', [BookController::class, 'download'])->name('books.download');
    Route::resource('books', BookController::class)->except([
        'create',
        'show',
        'edit'
    ]);
    Route::resource('book-categories', BookCategoryController::class)->except([
        'create',
        'show',
        'edit'
    ]);
});

require __DIR__ . '/auth.php';
