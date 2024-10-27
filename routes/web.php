<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Define routes
Route::get('/', [BookController::class, 'index'])->middleware('auth')->name('home');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::get('/favourites', [BookUserController::class, 'favourites'])->name('favourites');
Route::get('book/{book:slug}', [BookController::class, 'showButton'])->name('books.showButton');

// Post routes
Route::post('/books/{book:slug}/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/books/{book:slug}/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/book/{book:slug}favourites', [BookController::class, 'addToFavourites'])->name('books.addToFavourites'); 
Route::post('/book/{book:slug}/unfavourite', [BookController::class, 'removeFromFavourites'])->name('books.removeFromFavourites');




// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');


});

// Additional authentication routes if needed
require __DIR__.'/auth.php';
