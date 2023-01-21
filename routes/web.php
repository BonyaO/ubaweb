<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(PagesController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{id}/{slug}', 'blogDetail')->name('blog.detail');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/events', 'events')->name('events');
    Route::get('/events/{event}/{slug}', 'eventDetail')->name('events.detail');
    Route::get('/schools/{id}/{slug}', 'schoolDetail')->name('schools.detail');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
