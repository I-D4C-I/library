<?php



use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function () {

    Route::redirect('/', '/user/books')->name('user');

    Route::get('books', [BookController::class, 'index'])->name('user.books');
    Route::get('books/create', [BookController::class, 'create'])->name('user.books.create');
    Route::post('books', [BookController::class, 'store'])->name('user.books.store');

    Route::get('books/{book}', [BookController::class, 'show'])->name('user.books.show');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('user.books.edit');
    Route::put('books/{book}', [BookController::class, 'update'])->name('user.books.update');

    Route::delete('books/{book}', [BookController::class, 'delete'])->name('user.books.delete');
});
